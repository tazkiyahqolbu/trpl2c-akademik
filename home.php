<div id="heroCarousel"
     class="carousel slide mb-5"
     data-bs-ride="carousel"
     data-bs-interval="4000">

  <div class="carousel-inner rounded shadow-sm">

    <div class="carousel-item active">
      <img src="asset/gambar2.jpg"
           class="d-block w-100"
           style="max-height:380px; object-fit:cover;">
      <div class="carousel-caption d-none d-md-block text-start">
        <h4>Sistem Informasi Akademik</h4>
        <p class="mb-0">Aplikasi berbasis web untuk pengelolaan data akademik.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="asset/gambar3.jpg"
           class="d-block w-100"
           style="max-height:380px; object-fit:cover;">
      <div class="carousel-caption d-none d-md-block text-start">
        <h4>Database Terintegrasi</h4>
        <p class="mb-0">Data akademik tersimpan secara terpusat.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="asset/sita.jpg"
           class="d-block w-100"
           style="max-height:380px; object-fit:cover;">
      <div class="carousel-caption d-none d-md-block text-start">
        <h4>Pengelolaan Data</h4>
        <p class="mb-0">Mendukung proses akademik berbasis sistem informasi.</p>
      </div>
    </div>

  </div>

  <!-- PANAH -->
  <button class="carousel-control-prev"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next"
          type="button"
          data-bs-target="#heroCarousel"
          data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>



<!-- ===== SELAMAT DATANG ===== -->
<div class="row mb-4">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-2">
          Selamat Datang, <strong><?= $_SESSION['nama_lengkap']; ?></strong>
        </h4>
        <p class="text-muted mb-0">
          Gunakan menu di atas untuk mengelola data akademik.
        </p>
      </div>
    </div>
  </div>
</div>


<!-- ===== DASHBOARD CARD ===== -->
<div class="row">

  <div class="col-md-6 mb-4">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Data Mahasiswa</h5>
        <p class="card-text text-muted">
          Kelola data mahasiswa seperti menambah, mengubah, dan menghapus data.
        </p>
        <a href="index.php?p=mahasiswa" class="btn btn-primary">
          Kelola Mahasiswa
        </a>
      </div>
    </div>
  </div>

  <div class="col-md-6 mb-4">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Program Studi</h5>
        <p class="card-text text-muted">
          Kelola data program studi yang tersedia dalam sistem akademik.
        </p>
        <a href="index.php?p=program_studi" class="btn btn-primary">
          Kelola Program Studi
        </a>
      </div>
    </div>
  </div>

</div>
