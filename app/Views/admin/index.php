<?= view('layouts/header', ['title' => 'Dashboard', 'active' => 'dashboard']) ?>

<main>
  <div class="container py-5">
    <h2 class="mb-4 fw-bold text-center text-primary">Admin Dashboard</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card dashboard-card text-center p-4">
          <div class="card-icon mb-2"><i class="bi bi-ticket-perforated"></i></div>
          <h5 class="card-title">Kelola Jenis Tiket</h5>
          <p class="card-text">Tambah, edit, dan hapus tiket wahana.</p>
          <a href="<?= base_url('admin/ticket') ?>" class="btn btn-primary">Kelola Tiket</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card dashboard-card text-center p-4">
          <div class="card-icon mb-2"><i class="bi bi-graph-up-arrow"></i></div>
          <h5 class="card-title">Laporan Penjualan</h5>
          <p class="card-text">Lihat data penjualan tiket secara lengkap.</p>
          <a href="/admin/laporan" class="btn btn-outline-primary">Lihat Laporan</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?= view('layouts/footer') ?>
