<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{

    private function setUserSession($user)
    {
        $data = [
            'userId' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);

        return true;
    }

    public function index()
    {
        /* 
        
        
        */
        echo view('templates/header');
        echo ('
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-5 my-5 bg-white rounded-3 border">
                        <div class="container-fluid">
                            <h1 class="display-5 fw-bold">Users Index Page</h1>
                            <button class="btn btn-primary btn-lg" type="button">Press this button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            '
        );
        echo view('templates/footer');
    }

    public function login()
    {
        $data = [];

        helper(['form']);


        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);

                return redirect()->to('users/dashboard');
            }
        }

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    public function register()
    {
        $data = [];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'required_with[password]|matches[password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];

                $model->save($newData);

                $session = session();

                $session->setFlashdata('success', 'Successful Registration');

                return redirect()->to('users/login');
            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }


    public function dashboard()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('dashboard');
        echo view('templates/footer');
    }

    public function profile()
    {
        $data = [];
        helper(['form']);

        
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('users');
        }

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];
            
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                ];

                $model->save($newData);
                
                session()->set([
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname')
                ]);

                $session = session();

                $session->setFlashdata('success', 'Successfuly Updated');

                return redirect()->to('users/profile');
            }
        }
        
        $data['user'] = (new UserModel())->find(session()->get('userId'));

        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('users');
    }
}
