<?php
session_start();
require 'koneksi.php';

// proteksi login
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$email = $_SESSION['email'];

// proses update
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama_lengkap'];
  $password = $_POST['password'];

  if ($password != "") {
    $pass = md5($password);
    $koneksi->query(
      "UPDATE pengguna 
       SET nama_lengkap='$nama', password='$pass'
       WHERE email='$email'"
    );
  } else {
    $koneksi->query(
      "UPDATE pengguna 
       SET nama_lengkap='$nama'
       WHERE email='$email'"
    );
  }

  // update session
  $_SESSION['nama_lengkap'] = $nama;
  $success = true;
}

// ambil data terbaru
$data = $koneksi->query(
  "SELECT nama_lengkap, email FROM pengguna WHERE email='$email'"
)->fetch_assoc();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">

      <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

        <!-- HEADER -->
        <div class="bg-primary text-white text-center py-4">
          <div class="rounded-circle bg-white text-primary d-inline-flex align-items-center justify-content-center mb-2"
               style="width:90px;height:90px;font-size:36px;">
            <?= strtoupper(substr($data['nama_lengkap'], 0, 1)); ?>
          </div>
          <h5 class="mb-0">Edit Profil</h5>
          <small><?= $data['email']; ?></small>
        </div>

        <!-- BODY -->
        <div class="card-body p-4">

          <?php if (isset($success)) { ?>

            <!-- TAMPILAN SETELAH SUKSES -->
            <div class="alert alert-success text-center">
              Profil berhasil diperbarui
            </div>

            <div class="d-grid">
              <a href="profil.php" class="btn btn-primary">
                Kembali ke Profil
              </a>
            </div>

          <?php } else { ?>

            <!-- FORM SEBELUM SUBMIT -->
            <form method="post">

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       class="form-control"
                       value="<?= $data['email']; ?>"
                       readonly>
              </div>

              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text"
                       name="nama_lengkap"
                       class="form-control"
                       value="<?= $data['nama_lengkap']; ?>"
                       required>
              </div>

              <div class="mb-3">
                <label class="form-label">
                  Password Baru
                  <small class="text-muted">(kosongkan jika tidak diubah)</small>
                </label>
                <input type="password"
                       name="password"
                       class="form-control">
              </div>

              <div class="d-grid gap-2">
                <button type="submit"
                        name="simpan"
                        class="btn btn-primary">
                  Simpan Perubahan
                </button>
                <a href="profil.php" class="btn btn-outline-secondary">
                  Batal
                </a>
              </div>

            </form>

          <?php } ?>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
