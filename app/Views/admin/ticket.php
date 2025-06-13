<?= view('layouts/header', [
  'title' => 'Ticket Management',
  'active' => 'ticket'
]); ?>

<main class="table-container">
  <div class="container">
    <h2 class="my-4">Ticket Management</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Add New Ticket</button>

    <!-- Tabel Tiket -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Ticket Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Actions</th>
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
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $ticket['id'] ?>">Edit</button>
              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $ticket['id'] ?>">Delete</button>
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
        <h5 class="modal-title" id="addModalLabel">Add New Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Ticket Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Price</label>
          <input type="number" class="form-control" name="price" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stock</label>
          <input type="number" class="form-control" name="stock" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Ticket</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit & Delete Per Ticket -->
<?php foreach ($tickets as $ticket): ?>
  <!-- Modal Edit -->
  <div class="modal fade" id="editModal<?= $ticket['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/ticket/update/' . $ticket['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-header">
          <h5 class="modal-title">Edit Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Ticket Name</label>
            <input type="text" class="form-control" name="name" value="<?= $ticket['name'] ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="<?= $ticket['price'] ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" value="<?= $ticket['stock'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Delete -->
  <div class="modal fade" id="deleteModal<?= $ticket['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <form action="<?= base_url('admin/ticket/delete/' . $ticket['id']) ?>" method="post" class="modal-content">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-header">
          <h5 class="modal-title">Delete Ticket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete <strong><?= $ticket['name'] ?></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
<?php endforeach; ?>

<?= view('layouts/footer') ?>