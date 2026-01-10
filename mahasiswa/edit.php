<h1>Edit Mahasiswa</h1>

<?php 
require 'koneksi.php';
$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$id'");
$data = $edit->fetch_assoc();
?>

<form action="mahasiswa/proses.php" method="POST">
    <!-- primary key -->
    <input type="hidden" name="nim" value="<?= $data['nim'] ?>">

    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input 
        type="text" 
        name="nama_mhs" 
        class="form-control" 
        value="<?= $data['nama_mhs'] ?>" 
        required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal Lahir</label>
      <input 
        type="date" 
        name="tgl_lahir" 
        class="form-control" 
        value="<?= $data['tgl_lahir'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <textarea 
        name="alamat" 
        class="form-control" 
        rows="3"><?= $data['alamat'] ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Program Studi</label>
      <select name="id_program_studi" class="form-control" required>
        <?php
          $prodi = $koneksi->query("SELECT * FROM program_studi");
          while ($p = $prodi->fetch_assoc()):
            $selected = ($p['id'] == $data['id_program_studi']) ? 'selected' : '';
        ?>
          <option value="<?= $p['id']; ?>" <?= $selected; ?>>
            <?= $p['nama_prodi']; ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" name="update" class="btn btn-primary">Update</button>
      <a href="index.php?p=mahasiswa" class="btn btn-secondary">Kembali</a>
    </div>
</form>
