<?= view('layouts/header', ['title' => 'Daftar Tiket', 'active' => 'daftar']) ?>

<div class="container mt-4">
  <h2 class="mb-4">Daftar Tiket</h2>

  <div class="row">
    <?php foreach ($tickets as $ticket): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= esc($ticket['name']) ?></h5>
            <p class="card-text">
              Harga: <strong>Rp<?= number_format($ticket['price'], 0, ',', '.') ?></strong><br>
              Stok: <?= $ticket['stock'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= view('layouts/footer') ?>
