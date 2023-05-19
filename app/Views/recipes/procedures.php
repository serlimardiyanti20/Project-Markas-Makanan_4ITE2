<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-lg">
  <div class="row">
    <h3 class="fst-italic text-center mb-3"><?= $recipe['judul'] ?></h3>
    <div class="col-lg-6">
      <?php if (session()->getFlashdata('erros')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('errors') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endif; ?>
        <div class="card p-3">
          <form action="/procedures/<?= $recipe['id'] ?>" method="post">
            <div class="mb-3">
              <label for="prosedur" class="col-form-label">Prosedur</label>
              <input type="text" name="prosedur" id="prosedur" class="form-control">
            </div>
            <div class="mb-3">
              <label for="desc" class="col-form-label">Deskripsi (Opsional)</label>
              <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <button class="btn btn-sm btn-success">Submit</button>
          </form>
        </div>
        </div>
        <div class="col-lg-6">
          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->get('success') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <ol class="list-group list-group-numbered">
            <?php foreach ($procedures as $key => $data) : ?>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold"><?= $data['prosedur'] ?></div>
                  <?= $data['desc'] ?>
                </div>
                <form action="/procedures/<?= $data['id'] ?>" method="post">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn-close"></button>
                </form>
              </li>
            <?php endforeach; ?>
          </ol>
          <a href="/recipe" class="btn btn-sm btn-danger mt-3 float-end">Kembali</a>
        </div>
    </div>
  </div>
  <?= $this->endSection() ?>