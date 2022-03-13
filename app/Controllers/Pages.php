<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo ('<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-5 my-5 bg-white rounded-3 border">
                    <div class="container-fluid">
                        <h1 class="display-5 fw-bold">Public Index Page</h1>
                        <button class="btn btn-primary btn-lg" type="button">Press this button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>');
        echo view('templates/footer');
    }
}
