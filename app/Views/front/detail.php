<?= $this->extend('templates/front_main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
  <div class="col-lg-9">
    <div class="card mb-3">
      <div class=" row g-0">
        <div class="col-md-4">
          <img src="/upload/<?= $recipe['photo'] ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $recipe['judul'] ?></h5>
            <p class="card-text"><?= $recipe['content'] ?></p>
            <p class="card-text"><small class="text-body-secondary">Created by <?= $recipe['nama'] ?> at <?= substr($recipe['created_at'], 0, 20) ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <h3 class="fst-italic">Alat/Bahan</h3>
    <ol class="list-group list-group-numbered">
      <?php if (!$ingredients) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">Data tidak ada</div>
          </div>
        </li>
      <?php endif ?>
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
    <h3 class="fst-italic">Langkah-langkah</h3>
    <ol class="list-group list-group-numbered">
      <?php if (!$procedures) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">Data tidak ada</div>
          </div>
        </li>
      <?php endif ?>
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