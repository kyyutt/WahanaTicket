<?= view('layouts/header', ['title' => 'Riwayat Pemesanan', 'active' => 'riwayat']) ?>

<div class="container mt-4">
  <h2 class="mb-4">Riwayat Penjualan Tiket</h2>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Tiket</th>
        <th>Harga Tiket</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($sales) > 0): ?>
        <?php foreach ($sales as $index => $sale): ?>
          <tr>
            <td><?= $index + 1 ?></td>
            <td><?= esc($sale['ticket_name']) ?></td>
            <td>Rp<?= number_format($sale['ticket_price'], 0, ',', '.') ?></td>
            <td><?= $sale['quantity'] ?></td>
            <td>Rp<?= number_format($sale['total_price'], 0, ',', '.') ?></td>
            <td><?= date('d-m-Y H:i', strtotime($sale['created_at'])) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">Belum ada transaksi.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?= view('layouts/footer') ?>
