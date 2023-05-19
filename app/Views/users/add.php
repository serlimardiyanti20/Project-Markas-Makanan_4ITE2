<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-lg">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-warning">
          <?= session()->getFlashdata('errors') ?>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <div class="d-flex gap-3 justify-content-between">
            <h3 class="fst-italic">Tambah Data User</h3>
            <a href="/user" class="btn-close"></a>
          </div>
        </div>
        <div class="card-body">
          <form action="/user" method="post">
            <div class="mb-3 row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="email" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <select name="role" id="role" class="form-select">
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="repeat_password" class="col-sm-2 col-form-label">Repeat Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="repeat_password" name="repeat_password">
              </div>
            </div>
            <div class="float-end">
              <button class="btn btn-sm btn-markasmasak">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>