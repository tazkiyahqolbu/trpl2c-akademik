<h1>Tambah Program Studi</h1>

<form action="program_studi/proses.php" method="post">

  <div class="mb-3">
    <label class="form-label">Nama Program Studi</label>
    <input type="text" name="nama_prodi" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Jenjang</label>
    <select name="jenjang" class="form-control" required>
      <option value="">-- Pilih Jenjang --</option>
      <option value="D2">D2</option>
      <option value="D3">D3</option>
      <option value="D4">D4</option>
      <option value="S2">S2</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Akreditasi</label>
    <input type="text" name="akreditasi" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Keterangan</label>
    <textarea name="keterangan" rows="3" class="form-control"></textarea>
  </div>

  <!-- PENTING -->
  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
  <a href="index.php?p=program_studi" class="btn btn-secondary">Kembali</a>

</form>
