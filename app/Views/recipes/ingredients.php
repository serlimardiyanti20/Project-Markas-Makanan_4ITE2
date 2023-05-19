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
          <form action="/ingredients/<?= $recipe['id'] ?>" method="post">
            <div class="mb-3">
              <label for="bahan" class="col-form-label">Bahan-Bahan</label>
              <input type="text" name="bahan" id="bahan" class="form-control">
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
          <div class="table-responsive">
            <table class="table border mb-0 table-hover">
              <thead class="fw-semibold table-dark">
                <tr>
                  <th>#</th>
                  <th>Bahan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ingredients as $key => $data) : ?>
                  <tr class="align-center">
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['bahan'] ?></td>
                    <td>
                      <form action="/ingredients/<?= $data['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <a href="/recipe" class="btn btn-sm btn-danger mt-3 float-end">Kembali</a>
          </div>
        </div>
    </div>
  </div>
  <?= $this->endSection() ?>