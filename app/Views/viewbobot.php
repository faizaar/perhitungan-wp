<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Alternatif Table with Weighted Scores</h6>
          <!-- Button Tambah Data -->
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kriteria ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kriteria</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bobot</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Bobot Preferensi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($dataMb)): ?>
                  <?php foreach ($dataMb as $bobot): ?>
                    <tr>
                      <td class="text-center">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $bobot->kriteria_id; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          <?php echo $bobot->nama_kriteria ?? 'NULL'; ?>
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          <?php echo $bobot->bobot?? 'NULL'; ?>
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                          <?php echo $bobot->bobot_preferensi ?? 'NULL'; ?>
                        </p>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Data tidak ditemukan</p>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
