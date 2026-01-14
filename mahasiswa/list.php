<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h4 class="mb-1">Data Mahasiswa</h4>
        <small class="text-muted">
          Daftar mahasiswa yang terdaftar dalam sistem akademik
        </small>
      </div>
      <a href="index.php?p=create" class="btn btn-primary">
        + Tambah Data
      </a>
    </div>

    <!-- TABLE -->
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">

        <thead class="table-light">
          <tr>
            <th class="text-center" width="50">No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th class="text-center">Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Program Studi</th>
            <th class="text-center" width="140">Aksi</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          require 'koneksi.php';
          $tampil = $koneksi->query("
            SELECT 
              mahasiswa.*,
              program_studi.nama_prodi
            FROM mahasiswa
            LEFT JOIN program_studi 
              ON mahasiswa.id_program_studi = program_studi.id
          ");
          $no = 1;
          while ($data = mysqli_fetch_assoc($tampil)) {
        ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $data['nim']; ?></td>
            <td class="fw-semibold"><?= $data['nama_mhs']; ?></td>
            <td class="text-center">
              <?= $data['tgl_lahir'] ? $data['tgl_lahir'] : '-' ?>
            </td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['nama_prodi'] ?? '-' ?></td>
            <td class="text-center">
              <a href="index.php?key=<?= $data['nim']; ?>&p=edit"
                 class="btn btn-warning btn-sm">
                Edit
              </a>
              <a href="mahasiswa/proses.php?nim=<?= $data['nim'];?>&aksi=hapus"
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
