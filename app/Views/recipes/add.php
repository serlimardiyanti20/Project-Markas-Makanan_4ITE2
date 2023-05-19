<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-lg">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('errors') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <div class="d-flex gap-3 justify-content-between">
            <h3 class="fst-italic">Tambah Data Makanan</h3>
            <a href="/recipe" class="btn-close"></a>
          </div>
        </div>
        <div class="card-body">
          <?= form_open_multipart('/recipe', ['method' => 'post']) ?>
          <input type="hidden" name="create_by" value="<?= $user['id'] ?>">
          <div class="mb-3">
            <label for="judul" class="col-form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>">
          </div>
          <div class="mb-3">
            <label for="content" class="col-form-label">Deskripsi</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= old('content') ?></textarea>
          </div>
          <div class="mb-3">
            <label for="kesulitan" class="col-form-label">Lama Memasak (Menit)</label>
            <input type="number" name="durasi" id="durasi" class="form-control" value="<?= old('durasi') ?>">
          </div>
          <div class="mb-3">
            <label for="kesulitan" class="col-form-label">Level Kesulitan</label>
            <select name="kesulitan" id="kesulitan" class="form-select">
              <option value="mudah">Mudah</option>
              <option value="menengah">Menengah</option>
              <option value="sulit">Sulit</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="photo" class="col-form-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>
          <div class="float-end">
            <button class="btn btn-sm btn-markasmasak">Submit</button>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>