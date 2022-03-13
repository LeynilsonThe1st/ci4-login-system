<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 from-wrapper">
      <div class="container ">
        <div class="card p-3">
          <div class="card-body">
            <h3 class="card-title">Login</h3>
            <hr>

            <?php if (session()->get('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif; ?>

            <form action="/users/login" method="post">

              <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="eamil" class="form-control" value="<?= set_value('email') ?>">
              </div>

              <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>

              <?php if (isset($validation)) : ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="/users/register">Don't have an account yet?</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>