<?php
require 'koneksi.php';

$error = '';
$success = '';

if (isset($_POST['daftar'])) {
  $nama  = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $pass  = md5($_POST['password']);

  // cek email sudah terdaftar
  $cek = $koneksi->query(
    "SELECT email FROM pengguna WHERE email='$email'"
  );

  if ($cek->num_rows > 0) {
    $error = "Email sudah terdaftar";
  } else {
    $koneksi->query(
      "INSERT INTO pengguna (nama_lengkap, email, password)
       VALUES ('$nama','$email','$pass')"
    );
    $success = "Registrasi berhasil, silakan login";
  }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi | Sistem Informasi Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container vh-100 d-flex align-items-center">
  <div class="row justify-content-center w-100">

    <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">

      <!-- JUDUL -->
      <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">Sistem Informasi Akademik</h4>
        <p class="text-muted mb-0">Aplikasi Pengelolaan Data Akademik</p>
      </div>

      <!-- CARD REGISTER -->
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

          <!-- AVATAR -->
          <div class="text-center mb-3">
            <div class="rounded-circle bg-success text-white
                        d-inline-flex align-items-center justify-content-center"
                 style="width:80px;height:80px;font-size:32px;">
              👤
            </div>
          </div>

          <h5 class="text-center mb-4">Registrasi Pengguna</h5>

          <?php if ($error): ?>
            <div class="alert alert-danger text-center">
              <?= $error; ?>
            </div>
          <?php endif; ?>

          <?php if ($success): ?>
            <div class="alert alert-success text-center">
              <?= $success; ?>
            </div>
          <?php endif; ?>

          <?php if (!$success): ?>
          <form method="post">

            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text"
                     name="nama_lengkap"
                     class="form-control"
                     placeholder="Masukkan nama lengkap"
                     required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email"
                     name="email"
                     class="form-control"
                     placeholder="Masukkan email"
                     required>
            </div>

            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password"
                     name="password"
                     class="form-control"
                     placeholder="Masukkan password"
                     required>
            </div>

            <div class="d-grid">
              <button type="submit"
                      name="daftar"
                      class="btn btn-success">
                Daftar
              </button>
            </div>

          </form>
          <?php endif; ?>

          <p class="text-center mt-3 mb-0">
            Sudah punya akun?
            <a href="login.php" class="fw-semibold text-decoration-none">
             Masuk
            </a>
          </p>

        </div>
      </div>

      <!-- FOOTER -->
      <p class="text-center text-muted mt-3 small">
        © 2026 Sistem Informasi Akademik
      </p>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
