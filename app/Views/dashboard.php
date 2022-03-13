<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="p-5 my-5 bg-white rounded-3 border">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Hello, <?= ucwords(session()->get('firstname') . ' ' . session()->get('lastname')) ?></h1>
          <p class="col-md-8 fs-4">This is you dashboard, only can see this page. Here you can add, edit, remove and see all the content you have created.</p>
          <button class="btn btn-primary btn-lg" type="button">Press this button</button>
        </div>
      </div>
    </div>
  </div>
</div>