<?php
//session (simpan di server) | cookies (di simpan di browser mkanya kita vlose browernya ketika buka lgi dia masih tetap ada)
session_start();
if(!isset($_SESSION['login']))//variabel super global 
{
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi DB Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
  <div class="container">

    <a class="navbar-brand d-flex align-items-center" href="index.php">
      
      <!-- Grup Logo -->
      <div class="d-flex align-items-center me-4 gap-3">
        <img src="asset/logo-ti-pnp-05-1.png" alt="Logo Kampus" width="150" class="img-fluid">
      </div>

      <!-- Judul Sistem -->
      <span class="fw-bold fs-4 border-start ps-4 text-light">
        Sistem Akademik
      </span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mahasiswa">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=program_studi">Program Studi</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-semibold"
            href="#"
            role="button"
            data-bs-toggle="dropdown">
            <?= $_SESSION['nama_lengkap']; ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <a class="dropdown-item" href="profil.php">Profil</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger"
                href="logout.php"
                onclick="return confirm('Yakin ingin logout?')">
                Logout
              </a>
            </li>
          </ul>
        </li>

  </ul>
</li>

      </ul>
      
    </div>

  </div>
</nav>



  <div class="container my-4">
    <?php 
      $page = isset($_GET['p']) ? $_GET['p'] : 'home';
      
      if ($page == 'home') include 'home.php';
      elseif ($page == 'mahasiswa') include 'mahasiswa/list.php';
      elseif ($page == 'create') include 'mahasiswa/create.php';
      elseif ($page == 'edit') include 'mahasiswa/edit.php';
      elseif ($page == 'program_studi') include 'program_studi/list.php';
      elseif ($page == 'create_program_studi') include 'program_studi/create.php';
      elseif ($page == 'edit_program_studi') include 'program_Studi/edit.php';
      else include 'home.php';
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
