<?php
require 'koneksi.php';
?>

<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="mb-4">
      <h4 class="mb-1">Tambah Mahasiswa</h4>
      <small class="text-muted">
        Form penambahan data mahasiswa ke dalam sistem akademik
      </small>
    </div>

    <form action="mahasiswa/proses.php" method="post">

      <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text"
               name="nim"
               class="form-control"
               placeholder="Masukkan NIM mahasiswa"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text"
               name="nama_mhs"
               class="form-control"
               placeholder="Masukkan nama lengkap mahasiswa"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date"
               name="tgl_lahir"
               class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat"
                  rows="3"
                  class="form-control"
                  placeholder="Masukkan alamat mahasiswa"></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Program Studi</label>
        <select name="id_program_studi"
                class="form-select"
                required>
          <option value="">-- Pilih Program Studi --</option>

          <?php
            $prodi = $koneksi->query("SELECT * FROM program_studi");
            while ($p = $prodi->fetch_assoc()):
          ?>
            <option value="<?= $p['id']; ?>">
              <?= $p['nama_prodi']; ?> (<?= $p['jenjang']; ?>)
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- ACTION -->
      <div class="d-flex gap-2">
        <button type="submit"
                name="submit"
                class="btn btn-primary">
          Simpan
        </button>
        <a href="index.php?p=mahasiswa"
           class="btn btn-outline-secondary">
          Kembali
        </a>
      </div>

    </form>

  </div>
</div>
