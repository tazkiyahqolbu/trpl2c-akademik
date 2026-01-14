<?php
require 'koneksi.php';

$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM program_studi WHERE id='$id'");
$data = $edit->fetch_assoc();
?>

<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="mb-4">
      <h4 class="mb-1">Edit Program Studi</h4>
      <small class="text-muted">
        Form pengubahan data program studi dalam sistem akademik
      </small>
    </div>

    <form action="program_studi/proses.php" method="post">

      <!-- primary key -->
      <input type="hidden" name="id" value="<?= $data['id']; ?>">

      <div class="mb-3">
        <label class="form-label">Nama Program Studi</label>
        <input type="text"
               name="nama_prodi"
               class="form-control"
               value="<?= $data['nama_prodi']; ?>"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang"
                class="form-select"
                required>
          <option value="">-- Pilih Jenjang --</option>
          <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : ''; ?>>D2</option>
          <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : ''; ?>>D3</option>
          <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : ''; ?>>D4</option>
          <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : ''; ?>>S2</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Akreditasi</label>
        <input type="text"
               name="akreditasi"
               class="form-control"
               value="<?= $data['akreditasi']; ?>"
               required>
      </div>

      <div class="mb-4">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan"
                  rows="3"
                  class="form-control"><?= $data['keterangan']; ?></textarea>
      </div>

      <!-- ACTION -->
      <div class="d-flex gap-2">
        <button type="submit"
                name="update"
                class="btn btn-primary">
          Update
        </button>
        <a href="index.php?p=program_studi"
           class="btn btn-outline-secondary">
          Kembali
        </a>
      </div>

    </form>

  </div>
</div>
