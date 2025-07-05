<div class="container py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6>Tambah Data Konversi</h6>
        </div>
        <div class="card-body">
        <form method="POST" action="<?php echo site_url('Home/simpankonversi'); ?>">
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="mb-3">
              <label for="polisi_id" class="form-label">Polisi ID</label>
              <input type="text" class="form-control" id="polisi_id" name="polisi_id" required>
            </div>
            <div class="mb-3">
              <label for="kriteria_id" class="form-label">Kriteria ID</label>
              <input type="text" class="form-control" id="kriteria_id" name="kriteria_id" required>
            </div>
            <div class="mb-3">
              <label for="nilai" class="form-label">Nilai</label>
              <input type="text" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
