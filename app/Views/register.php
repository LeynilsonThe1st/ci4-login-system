<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 from-wrapper">
      <div class="container ">
        <div class="card p-3">
          <div class="card-body">
            <h3 class="card-title">Register</h3>
            <hr>
            <form action="/users/register" method="post">
              <div class="row">

                <div class="col-12 col-sm-6">
                  <div class="form-group mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="firstname" name="firstname" id="firstname" class="form-control" value="<?= set_value('firstname') ?>">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="lastname" name="lastname" id="lastname" class="form-control" value="<?= set_value('lastname') ?>">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                </div>

                <div class="col-12 col-sm-6">
                  <div class="form-group mb-3">
                    <label for="password_confirm" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                  </div>
                </div>

                <?php if (isset($validation)) : ?>
                  <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                      <?= $validation->listErrors() ?>
                    </div>
                  </div>
                <?php endif; ?>


              </div>

              <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="/users/login">Already have an account?</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>