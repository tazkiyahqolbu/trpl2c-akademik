<div class="card shadow-sm">
  <div class="card-body">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">List Data Program Studi</h4>
      <a href="index.php?p=create_program_studi" class="btn btn-primary">
        Tambah Data
      </a>
    </div>

    <!-- TABLE -->
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th width="50">No</th>
            <th>Nama Prodi</th>
            <th width="120">Jenjang</th>
            <th width="120">Akreditasi</th>
            <th>Keterangan</th>
            <th width="120">Aksi</th>
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
            <td><?= $data['nama_prodi']; ?></td>
            <td><?= $data['jenjang']; ?></td>
            <td><?= $data['akreditasi']; ?></td>
            <td><?= $data['keterangan']; ?></td>
            <td>
              <a href="index.php?key=<?= $data['id']; ?>&p=edit_program_studi"
                 class="btn btn-warning btn-sm">
                 Edit
              </a>
              <a href="program_studi/proses.php?id=<?= $data['id']; ?>&aksi=hapus"
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin ingin menghapus data ini?')">
                 Hapus
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>

      </table>
    </div>

  </div>
</div>
