<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Sistem Informasi Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container vh-100 d-flex align-items-center">
  <div class="row justify-content-center w-100">

    <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
      
      <!-- Judul Sistem -->
      <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">Sistem Informasi Akademik</h4>
        <p class="text-muted mb-0">Aplikasi Pengelolaan Data Akademik</p>
      </div>

      <!-- Card Login -->
      <div class="card shadow-sm">
        <div class="card-body p-4">

          <h5 class="text-center mb-4">Login Pengguna</h5>

          <form method="post">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                Masuk Sistem
              </button>
            </div>
          </form>

          <?php 
          if(isset($_POST['email'])){
              $email = $_POST['email'];
              $pass = md5($_POST['password']);

              require 'koneksi.php';
              $ceklogin = $koneksi->query(
                "SELECT nama_lengkap FROM pengguna 
                 WHERE email='$email' AND password='$pass'"
              );

              if($ceklogin->num_rows == 1){
                 session_start();
                 $_SESSION['login'] = TRUE;
                 $_SESSION['email'] = $email;
                 $_SESSION['nama_lengkap'] = $ceklogin->fetch_row()[0];
                 header("Location: index.php");
              } else {
                  echo '<div class="alert alert-danger mt-3 text-center">
                          Email atau password salah
                        </div>';
              }
          }
          ?>

        </div>
      </div>

      <!-- Footer kecil -->
      <p class="text-center text-muted mt-3 small">
        © 2026 Sistem Informasi Akademik
      </p>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
