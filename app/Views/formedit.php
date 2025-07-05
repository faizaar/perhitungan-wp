<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Update Data Alternatif</h6>
                </div>
                <div class="card-body">
                    <!-- Form Update -->
                    <form method="POST" action="<?php echo site_url('Home/update_data/' . $datamb->polisi_id); ?>">
                        <div class="mb-3">
                            <label for="polisi_id" class="form-label">Polisi ID</label>
                            <input type="text" class="form-control" id="polisi_id" name="polisi_id" value="<?php echo $datamb->polisi_id; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $datamb->nama; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
