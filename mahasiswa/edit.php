<?php
require 'koneksi.php';

$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$id'");
$data = $edit->fetch_assoc();
?>

<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="mb-4">
      <h4 class="mb-1">Edit Mahasiswa</h4>
      <small class="text-muted">
        Form pengubahan data mahasiswa dalam sistem akademik
      </small>
    </div>

    <form action="mahasiswa/proses.php" method="post">

      <!-- primary key -->
      <input type="hidden" name="nim" value="<?= $data['nim']; ?>">

      <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text"
               class="form-control"
               value="<?= $data['nim']; ?>"
               readonly>
      </div>

      <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text"
               name="nama_mhs"
               class="form-control"
               value="<?= $data['nama_mhs']; ?>"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date"
               name="tgl_lahir"
               class="form-control"
               value="<?= $data['tgl_lahir']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat"
                  rows="3"
                  class="form-control"><?= $data['alamat']; ?></textarea>
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
              $selected = ($p['id'] == $data['id_program_studi']) ? 'selected' : '';
          ?>
            <option value="<?= $p['id']; ?>" <?= $selected; ?>>
              <?= $p['nama_prodi']; ?> (<?= $p['jenjang']; ?>)
            </option>
          <?php endwhile; ?>
        </select>
      </div>

      <!-- ACTION -->
      <div class="d-flex gap-2">
        <button type="submit"
                name="update"
                class="btn btn-primary">
          Update
        </button>
        <a href="index.php?p=mahasiswa"
           class="btn btn-outline-secondary">
          Kembali
        </a>
      </div>

    </form>

  </div>
</div>
