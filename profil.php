<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$email = $_SESSION['email'];
$data = $koneksi->query(
  "SELECT nama_lengkap, email FROM pengguna WHERE email='$email'"
)->fetch_assoc();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">

      <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

        <!-- Header Card -->
        <div class="bg-primary text-white text-center py-4">
          <div class="rounded-circle bg-white text-primary d-inline-flex align-items-center justify-content-center mb-2"
               style="width:90px;height:90px;font-size:36px;">
            <?= strtoupper(substr($data['nama_lengkap'], 0, 1)); ?>
          </div>
          <h5 class="mb-0"><?= $data['nama_lengkap']; ?></h5>
          <small><?= $data['email']; ?></small>
        </div>

        <!-- Body -->
        <div class="card-body p-4">

          <h6 class="fw-semibold mb-3">Informasi Akun</h6>

          <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted">Nama Lengkap</span>
              <span class="fw-medium"><?= $data['nama_lengkap']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted">Email</span>
              <span class="fw-medium"><?= $data['email']; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted">Status Akun</span>
              <span class="badge bg-success">Aktif</span>
            </li>
          </ul>

          <p class="text-muted small mb-4">
            Akun ini terdaftar sebagai pengguna sistem akademik dan memiliki akses pengelolaan data.
          </p>

          <div class="d-grid gap-2">
            <a href="edit_profil.php" class="btn btn-primary">
              Edit Profil
            </a>
            <a href="index.php" class="btn btn-outline-secondary">
              Kembali ke Dashboard
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
