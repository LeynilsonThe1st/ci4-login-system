<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 from-wrapper">
      <div class="container ">
        <div class="card p-3">
          <div class="card-body">
            <h3 class="card-title">Update your information</h3>
            <hr>

            <?php if (session()->get('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif; ?>

            <form action="/users/profile" method="post">
              <div class="row">

                <div class="col-12">
                  <div class="form-group mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="firstname" name="firstname" id="firstname" class="form-control" value="<?= set_value('firstname', $user['firstname']) ?>">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="lastname" name="lastname" id="lastname" class="form-control" value="<?= set_value('lastname', $user['lastname']) ?>">
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
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>