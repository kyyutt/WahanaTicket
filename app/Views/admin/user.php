<?= view('layouts/header', [
  'title' => 'Manajemen Pengguna',
  'active' => 'user'
]); ?>

<main class="table-container">
  <div class="container">
    <h2 class="my-4">Manajemen Pengguna (Kasir)</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Pengguna Baru</button>

    <!-- Tabel Pengguna -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Peran</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= ucfirst($user['role']) ?></td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['id'] ?>">Ubah</button>
              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user['id'] ?>">Hapus</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form action="<?= base_url('admin/user/store') ?>" method="post" class="modal-content">
      <?= csrf_field() ?>
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Peran</label>
          <select name="role" class="form-select" required>
            <option value="kasir">Kasir</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit & Hapus -->
<?php foreach ($users as $user): ?>
  <!-- Modal Edit -->
  <div class="modal fade" id="editModal<?= $user['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/user/update/' . $user['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="mb-3">
            <label class="form-label">Peran</label>
            <select name="role" class="form-select" required>
              <option value="kasir" <?= $user['role'] === 'kasir' ? 'selected' : '' ?>>Kasir</option>
              <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div class="modal fade" id="deleteModal<?= $user['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/user/delete/' . $user['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus pengguna <strong><?= $user['username'] ?></strong>?
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
