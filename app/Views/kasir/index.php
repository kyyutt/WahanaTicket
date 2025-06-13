<?= view('layouts/header', ['title' => 'Dashboard', 'active' => 'dashboard']) ?>

<main>
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center text-primary">Ticketing Dashboard</h2>
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card dashboard-card h-100 text-center p-4">
                    <div class="card-icon mb-2">
                        <i class="bi bi-ticket-detailed"></i>
                    </div>
                    <h5 class="card-title">Pesan Tiket</h5>
                    <p class="card-text">Mulai pemesanan tiket untuk pengunjung wahana.</p>
                    <a href="<?= base_url('kasir/sales') ?>" class="btn btn-primary mt-auto">Mulai</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card dashboard-card h-100 text-center p-4">
                    <div class="card-icon mb-2">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="card-title">Riwayat Pemesanan</h5>
                    <p class="card-text">Lihat data pemesanan yang sudah dilakukan sebelumnya.</p>
                    <a href="<?= base_url('kasir/riwayat') ?>" class="btn btn-outline-primary mt-auto">Lihat</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card dashboard-card h-100 text-center p-4">
                    <div class="card-icon mb-2">
                        <i class="bi bi-map"></i>
                    </div>
                    <h5 class="card-title">Wahana & Tiket</h5>
                    <p class="card-text">Cek informasi wahana serta ketersediaan tiket.</p>
                    <a href="<?= base_url('kasir/daftar-tiket') ?>" class="btn btn-outline-primary mt-auto">Cek</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?= view('layouts/footer') ?>