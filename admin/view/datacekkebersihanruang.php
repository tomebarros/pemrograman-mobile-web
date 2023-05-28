  <input class="form-control mt-2" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>Tanggal</small></th>
          <th><small>Nama Ruang</small></th>
          <th><small>Cleaning Service</small></th>
          <th><small>Status</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = query("SELECT cekkebersihanruang.idcekkebersihanruang, cekkebersihanruang.tanggal, cekkebersihanruang.idruang,ruang.namaruang, CASE cekkebersihanruang.status WHEN '1' THEN 'Sangat Kotor' WHEN '2' THEN 'Cukup Kotor' WHEN '3' THEN 'Sedang Dibersihkan' WHEN '4' THEN 'Telah Dibersihkan' END as status, karyawan.nama FROM cekkebersihanruang,ruang,karyawan WHERE cekkebersihanruang.idruang = ruang.idruang AND cekkebersihanruang.idkaryawan = karyawan.idkaryawan;");
        foreach ($data as $d) {
        ?>
          <tr <?php

              switch ($d['status']) {

                case 'Sangat Kotor':
                  echo 'class="bg-danger text-light"';
                  break;
                case 'Cukup Kotor':
                  echo 'class="bg-warning text-dark"';
                  break;
                default:
                  echo 'class="bg-light text-dark"';
                  break;
              }
              ?>>
            <td><small><?= $no++; ?></small></td>
            <td><small><?= tanggal($d['tanggal']); ?></small></td>
            <td><small><?= $d['namaruang']; ?></small></td>
            <td><small><?= nama($d['nama']); ?></small></td>
            <td><small><?= $d['status']; ?></small></td>
            <td>
              <small>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idcekkebersihanruang']; ?>" <?= $d['status'] == 'Cukup Kotor' ? 'class="text-dark"' : '' ?>>Ubah</a>
                <a href="../controller/delete/datacekkebersihanruang.php?q=<?= $d['idcekkebersihanruang']; ?>" <?= $d['status'] == 'Cukup Kotor' ? 'class="text-dark"' : '' ?>>Hapus</a>
              </small>
            </td>
          </tr>




          <!-- Modal -->
          <div class="modal fade" id="modalUbah<?= $d['idcekkebersihanruang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Ruang</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <form action="../controller/update/datacekkebersihanruang.php" method="post">
                    <input type="hidden" name="idcekkebersihanruang" value="<?= $d['idcekkebersihanruang']; ?>">
                    <input type="hidden" name="lokasi" value="<?= $lokasi; ?>">

                    <div class="input-group mb-2">
                      <span class="input-group-text">Tanggal</span>
                      <input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal']; ?>" required>
                    </div>

                    <div class="input-group mb-2">
                      <span class="input-group-text">Ruang</span>
                      <select name="idruang" class="form-select" required>
                        <?php
                        $id = $d['idruang'];
                        $dataRuang = query("SELECT * FROM ruang");
                        foreach ($dataRuang as $d2) {
                          if ($id == $d2['idruang']) {
                            echo "<option selected value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
                          } else {
                            echo "<option  value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="input-group mb-2">
                      <span class="input-group-text">Status</span>
                      <select name="status" class="form-select" required>

                        <option value="1" <?= $d['status'] == 'Sangat Kotor' ? 'selected' : '' ?>>Sangat Kotor</option>
                        <option value="2" <?= $d['status'] == 'Cukup Kotor' ? 'selected' : '' ?>>Cukup Kotor</option>
                        <option value="3" <?= $d['status'] == 'Sedang Dibersihkan' ? 'selected' : '' ?>>Sedang Dibersihkan</option>
                        <option value="4" <?= $d['status'] == 'Telah Dibersihkan' ? 'selected' : '' ?>>Telah Dibersihkan</option>

                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Simpan">
                  </form>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>


        <?php } ?>
      </tbody>
    </table>
  </div>


  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>