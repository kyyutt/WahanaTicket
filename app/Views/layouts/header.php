<!-- layouts/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? 'WahanaTicket'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html, body { height: 100%; }
    body { display: flex; flex-direction: column; }
    main { flex: 1; }
    .dashboard-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }
    .dashboard-card:hover { transform: translateY(-5px); }
    .card-icon { font-size: 2.5rem; color: #0d6efd; }
    .navbar-brand { font-weight: bold; }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand text-primary" href="#">WahanaTicket</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">

        <?php if (session()->get('role') == 'admin'): ?>
          <li class="nav-item"><a class="nav-link <?= ($active == 'dashboard') ? 'active' : '' ?>" href="<?= base_url ('admin')?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link <?= ($active == 'tiket') ? 'active' : '' ?>" href="<?= base_url('admin/ticket') ?>">Kelola Tiket</a></li>
            <li class="nav-item"><a class="nav-link <?= ($active == 'user') ? 'active' : '' ?>" href="<?= base_url('admin/user') ?>">Kelola User</a></li>
          <li class="nav-item"><a class="nav-link <?= ($active == 'laporan') ? 'active' : '' ?>" href="<?= base_url('admin/laporan') ?>">Laporan</a></li>
        
        <?php elseif (session()->get('role') == 'kasir'): ?>
          <li class="nav-item"><a class="nav-link <?= ($active == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('kasir') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link <?= ($active == 'pemesanan') ? 'active' : '' ?>" href="<?= base_url('kasir/sales') ?>">Jual Tiket</a></li>
          <li class="nav-item"><a class="nav-link <?= ($active == 'riwayat') ? 'active' : '' ?>" href="<?= base_url('kasir/riwayat') ?>">Riwayat</a></li>
          <li class="nav-item"><a class="nav-link <?= ($active == 'daftar') ? 'active' : '' ?>" href="<?= base_url('kasir/daftar-tiket') ?>">Daftar Tiket</a></li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i> <?= session()->get('username'); ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-danger" href="/auth/logout"><i class="bi bi-box-arrow-right me-1"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
