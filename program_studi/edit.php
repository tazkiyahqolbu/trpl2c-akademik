<h1>Edit Program Studi</h1>

<?php 
require 'koneksi.php';

$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM program_studi WHERE id='$id'");
$data = $edit->fetch_assoc();
?>

<form action="program_studi/proses.php" method="POST">
    <!-- primary key -->
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
      <label class="form-label">Nama Program Studi</label>
      <input type="text" name="nama_prodi" class="form-control" value="<?= $data['nama_prodi'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jenjang</label>
      <input type="text" name="jenjang" class="form-control" value="<?= $data['jenjang'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Akreditasi</label>
      <input type="text" name="akreditasi" class="form-control" value="<?= $data['akreditasi'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control"><?= $data['keterangan'] ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php?p=program_studi" class="btn btn-secondary">Kembali</a>
</form>
