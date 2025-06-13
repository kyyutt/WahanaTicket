<?= view('layouts/header', ['title' => 'Penjualan Tiket', 'active' => 'pemesanan']) ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Penjualan Tiket</h4>
        </div>

        <div class="card-body">
          <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
          <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>
          <form action="<?= base_url('sales/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label class="form-label">Pilih Tiket</label>
              <select name="ticket_id" class="form-select" required>
                <option value="" hidden>-- Pilih Tiket --</option>
                <?php foreach ($tickets as $ticket): ?>
                  <option value="<?= $ticket['id'] ?>">
                    <?= $ticket['name'] ?> - Stok: <?= $ticket['stock'] ?> - Rp<?= number_format($ticket['price'], 0, ',', '.') ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" name="quantity" class="form-control" min="1" required>
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-cart-plus"></i> Simpan Transaksi
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?= view('layouts/footer') ?>
