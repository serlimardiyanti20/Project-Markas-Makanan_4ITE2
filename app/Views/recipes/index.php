<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<div class="container-lg">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->get('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <div class="table-responsive">
    <div class="float-end mb-3">
      <a href="/recipe/new" class="btn btn-sm btn-success">Tambah Data</a>
    </div>

    <table class="table border mb-0 table-hover">
      <thead class="fw-semibold table-dark">
        <tr>
          <th>#</th>
          <th>Pembuat</th>
          <th>Judul</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recipes as $key => $data) : ?>
          <tr class="align-center">
            <td><?= $key + 1 ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['judul'] ?></td>
            <td>
              <form action="/recipe/<?= $data['id'] ?>" method="post">
                <?= csrf_field() ?>
                <a href="/recipe/<?= $data['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                <a href="/ingredients/<?= $data['id'] ?>" class="btn btn-sm btn-warning">Alat/Bahan</a>
                <a href="/procedures/<?= $data['id'] ?>" class="btn btn-sm btn-info">Prosedur</a>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="col-12 mt-3">
      <?= $pager->links('recipes', 'custom_pagination') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>