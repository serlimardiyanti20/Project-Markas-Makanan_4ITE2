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
      <a href="/user/new" class="btn btn-sm btn-success">Tambah Data</a>
    </div>

    <table class="table border mb-0 table-hover">
      <thead class="fw-semibold table-dark">
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $key => $data) : ?>
          <tr class="align-center">
            <td><?= $key + 1 ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['role'] ?></td>
            <td>
              <form action="/user/<?= $data['id'] ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                <a href="/user/<?= $data['id'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="col-12 mt-3">
      <?= $pager->links('users', 'custom_pagination') ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>