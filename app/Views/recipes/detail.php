<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-lg">
  <div class="row">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="/upload/<?= $recipe['photo'] ?>" class="img-fluid rounded" alt="Photo <?= $recipe['judul'] ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $recipe['judul'] ?></h5>
            <p class="card-text"><?= $recipe['content'] ?></p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <h3 class="fst-italic text-center">Alat & Bahan</h3>
      <ol class="list-group list-group-numbered">
        <?php foreach ($ingredients as $key => $data) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?= $data['bahan'] ?></div>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <div class="col-lg-6">
      <h3 class="fst-italic text-center">Langkah-Langkah</h3>
      <ol class="list-group list-group-numbered">
        <?php foreach ($procedures as $key => $data) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?= $data['prosedur'] ?></div>
              <?= $data['desc'] ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>

</div>
<?= $this->endSection() ?>