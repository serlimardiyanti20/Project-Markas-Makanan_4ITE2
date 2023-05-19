<?= $this->extend('templates/auth') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('errors')) : ?>
  <div class="alert alert-danger">
    <?= session()->getFlashdata('errors') ?>
  </div>
<?php endif; ?>

<div class="card mb-4 mx-4">
  <div class="card-body p-4">
    <h1>Register</h1>
    <p class="text-medium-emphasis">Create your account</p>
    <form action="/register" method="post">
      <input type="hidden" name="role" id="role" value="">
      <div class="input-group mb-3"><span class="input-group-text">
          <svg class="icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg></span>
        <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama" value="<?= old('nama') ?>">
      </div>
      <div class="input-group mb-3"><span class="input-group-text">
          <svg class="icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg></span>
        <input class="form-control" type="text" placeholder="Username" name="username" id="username" value="<?= old('username') ?>">
      </div>
      <div class="input-group mb-3"><span class="input-group-text">
          <svg class="icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
          </svg></span>
        <input class="form-control" type="email" placeholder="Email" name="email" id="email" value="<?= old('email') ?>">
      </div>
      <div class="input-group mb-3"><span class="input-group-text">
          <svg class="icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
          </svg></span>
        <input class="form-control" type="password" placeholder="Password" name="password" id="password">
      </div>
      <div class="input-group mb-4"><span class="input-group-text">
          <svg class="icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
          </svg></span>
        <input class="form-control" type="password" placeholder="Repeat password" name="repeat_password" id="repeat_password">
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-block btn-markasmasak" type="Submit">Create Account</button>
        <a href="/login" class="btn btn-block btn-dark">Already have account! Login</a>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>