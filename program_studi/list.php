<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h4 class="mb-1">Data Program Studi</h4>
        <small class="text-muted">
          Daftar program studi yang tersedia dalam sistem akademik
        </small>
      </div>
      <a href="index.php?p=create_program_studi" class="btn btn-primary">
        + Tambah Data
      </a>
    </div>

    <!-- TABLE -->
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">

        <thead class="table-light">
          <tr>
            <th class="text-center" width="50">No</th>
            <th>Nama Program Studi</th>
            <th class="text-center" width="120">Jenjang</th>
            <th class="text-center" width="120">Akreditasi</th>
            <th>Keterangan</th>
            <th class="text-center" width="140">Aksi</th>
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
            <td class="text-center"><?= $no++ ?></td>
            <td class="fw-semibold"><?= $data['nama_prodi']; ?></td>
            <td class="text-center"><?= $data['jenjang']; ?></td>
            <td class="text-center">
              <span class="badge bg-info text-dark">
                <?= $data['akreditasi']; ?>
              </span>
            </td>
            <td><?= $data['keterangan'] ?: '-'; ?></td>
            <td class="text-center">
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
