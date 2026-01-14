<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4">

    <!-- HEADER -->
    <div class="mb-4">
      <h4 class="mb-1">Tambah Program Studi</h4>
      <small class="text-muted">
        Form penambahan data program studi ke dalam sistem akademik
      </small>
    </div>

    <form action="program_studi/proses.php" method="post">

      <div class="mb-3">
        <label class="form-label">Nama Program Studi</label>
        <input type="text"
               name="nama_prodi"
               class="form-control"
               placeholder="Masukkan nama program studi"
               required>
      </div>

      <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang"
                class="form-select"
                required>
          <option value="">-- Pilih Jenjang --</option>
          <option value="D2">D2</option>
          <option value="D3">D3</option>
          <option value="D4">D4</option>
          <option value="S2">S2</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Akreditasi</label>
        <input type="text"
               name="akreditasi"
               class="form-control"
               placeholder="Contoh: A, B, Baik Sekali"
               required>
      </div>

      <div class="mb-4">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan"
                  rows="3"
                  class="form-control"
                  placeholder="Keterangan tambahan (opsional)"></textarea>
      </div>

      <!-- ACTION -->
      <div class="d-flex gap-2">
        <button type="submit"
                name="submit"
                class="btn btn-primary">
          Simpan
        </button>
        <a href="index.php?p=program_studi"
           class="btn btn-outline-secondary">
          Kembali
        </a>
      </div>

    </form>

  </div>
</div>
