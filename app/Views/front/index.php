<?= $this->extend('templates/front_main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
  <h3 class="fst-italic mb-5 text-center">Selamat datang di Markas Masakan <?= $user['nama'] ?>!</h3>
  <form action="" method="get">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari Resep Makanan" name="query">
      <button class="input-group-text bg-markasmasakan" type="submit" name="submit">Cari</button>
    </div>
  </form>
  <div class="col-lg">
    <div class="d-flex my-5" style="flex-wrap: wrap;">
      <?php foreach ($recipes as $key => $data) : ?>
        <div class="col-md-3 col-lg-3 col-sm-2">
          <div class="card mx-2 my-2">
            <img src="/upload/<?= $data['photo'] ?>" class="card-img-top" alt="Photo <?= $data['judul'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $data['judul'] ?></h5>
              <p class="card-text"><?= substr($data['content'], 0, 50) . "...."  ?></p>
              <a href="/front/<?= $data['id'] ?>" class="btn btn-markasmasakan">Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="col-12 mt-3">
      <?= $pager->links('recipes', 'custom_pagination') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>