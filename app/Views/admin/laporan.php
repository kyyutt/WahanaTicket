<?= view('layouts/header', ['title' => 'Laporan Penjualan', 'active' => 'laporan']) ?>

<div class="container mt-4">
  <h2 class="mb-4">Laporan Penjualan Tiket</h2>

  <button class="btn btn-secondary mb-3" onclick="window.print()">Cetak Laporan</button>

  <table class="table table-bordered">
    <thead class="table-secondary">
      <tr>
        <th>No</th>
        <th>Nama Tiket</th>
        <th>Harga Tiket</th>
        <th>Jumlah</th>
        <th>Kasir</th>
        <th>Tanggal</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; $grandTotal = 0; ?>
      <?php foreach ($sales as $sale): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= esc($sale['ticket_name']) ?></td>
          <td>Rp<?= number_format($sale['ticket_price'], 0, ',', '.') ?></td>
          <td><?= $sale['quantity'] ?></td>
          <td><?= esc($sale['kasir_name']) ?></td>
          <td><?= date('d-m-Y H:i', strtotime($sale['created_at'])) ?></td>
          <td>Rp<?= number_format($sale['total_price'], 0, ',', '.') ?></td>
        </tr>
        <?php $grandTotal += $sale['total_price']; ?>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6">Total Keseluruhan</th>
        <th>Rp<?= number_format($grandTotal, 0, ',', '.') ?></th>
      </tr>
    </tfoot>
  </table>
</div>

<style>
  @media print {
    button, nav, footer {
      display: none !important;
    }
    body {
      margin: 20px;
    }
  }
</style>

<?= view('layouts/footer') ?>
