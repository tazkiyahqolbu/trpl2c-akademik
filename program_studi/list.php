<h1>List Data Program Studi</h1>
<a href="index.php?p=create_program_studi" class="btn btn-primary">Tambah Data</a>
<br><br>

<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Prodi</th>
      <th>Jenjang</th>
      <th>Akreditasi</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      require 'koneksi.php';
      $tampil = $koneksi->query("SELECT * FROM program_studi");
      $no = 1;
      while ($data = mysqli_fetch_assoc($tampil)) {
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data['nama_prodi'] ?></td>
      <td><?= $data['jenjang'] ?></td>
      <td><?= $data['akreditasi'] ?></td>
      <td><?= $data['keterangan'] ?></td>
      <td>
        <a href="index.php?p=edit_program_studi&key=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="program_studi/proses.php?aksi=hapus&id=<?= $data['id'] ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
