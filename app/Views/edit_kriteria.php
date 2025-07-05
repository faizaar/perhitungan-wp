<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Update Data Kriteria</h6>
                </div>
                <div class="card-body">
                    <!-- Form Update -->
                    <form method="POST" action="<?php echo site_url('Home/updatekriteria/' . $datamb->kriteria_id); ?>">
                        <div class="mb-3">
                            <label for="kriteria_id" class="form-label">Kriteria ID</label>
                            <input type="text" class="form-control" id="kriteria_id" name="kriteria_id" value="<?php echo $datamb->kriteria_id; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $datamb->nama; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" value="<?php echo $datamb->bobot; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <select class="form-control" id="tipe" name="tipe">
                                <option value="Benefit">Benefit</optio>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
