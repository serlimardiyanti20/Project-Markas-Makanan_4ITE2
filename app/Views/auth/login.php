<?= $this->extend('templates/auth') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('errors')) : ?>
  <div class="alert alert-danger">
    <?= session()->getFlashdata('errors') ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success">
    <?= session()->get('success') ?>
  </div>
<?php endif; ?>

<div class="card-group d-block d-md-flex row">
  <div class="card col-md-7 p-4 mb-0">
    <div class="card-body">
      <h1>Login</h1>
      <p class="text-medium-emphasis">Sign In to your account</p>
      <form action="/login" method="post">
        <div class="input-group mb-3"><span class="input-group-text">
            <svg class="icon">
              <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg></span>
          <input class="form-control" type="text" placeholder="Username" name="username" id="username">
        </div>
        <div class="input-group mb-4"><span class="input-group-text">
            <svg class="icon">
              <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
            </svg></span>
          <input class="form-control" type="password" placeholder="Password" name="password" id="password">
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-markasmasak">Login</button>
          <a href="/register" class="btn btn-dark">Don't have account? Register!</a>
        </div>
      </form>
    </div>
  </div>
  <div class="card col-md-5 text-white bg-markasmasak py-5">
    <div class="card-body text-center">
      <img src="/assets/img/markas-masak.jpg" alt="" class="img-fluid" width="300">
    </div>
  </div>
</div>
<?= $this->endSection() ?>