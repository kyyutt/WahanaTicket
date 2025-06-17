<?= view('layouts/header', [
  'title' => 'Manajemen Tiket',
  'active' => 'ticket'
]); ?>

<main class="table-container">
  <div class="container">
    <h2 class="my-4">Manajemen Tiket</h2>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Tiket Baru</button>

    <!-- Tabel Tiket -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Tiket</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tickets as $ticket): ?>
          <tr>
            <td><?= $ticket['id'] ?></td>
            <td><?= $ticket['name'] ?></td>
            <td>Rp<?= number_format($ticket['price'], 0, ',', '.') ?></td>
            <td><?= $ticket['stock'] ?></td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $ticket['id'] ?>">Ubah</button>
              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $ticket['id'] ?>">Hapus</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('admin/ticket/store') ?>" method="post" class="modal-content">
      <?= csrf_field() ?>
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Tiket Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nama Tiket</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" class="form-control" name="price" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" class="form-control" name="stock" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit & Hapus -->
<?php foreach ($tickets as $ticket): ?>
  <!-- Modal Edit -->
  <div class="modal fade" id="editModal<?= $ticket['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/ticket/update/' . $ticket['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Tiket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Tiket</label>
            <input type="text" class="form-control" name="name" value="<?= $ticket['name'] ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" name="price" value="<?= $ticket['price'] ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stock" value="<?= $ticket['stock'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div class="modal fade" id="deleteModal<?= $ticket['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/ticket/delete/' . $ticket['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Tiket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah kamu yakin ingin menghapus <strong><?= $ticket['name'] ?></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
<?php endforeach; ?>

<?= view('layouts/footer') ?>
