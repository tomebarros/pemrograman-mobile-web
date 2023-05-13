  <input class="form-control" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>Tanggal</small></th>
          <th><small>Nama Kamar</small></th>
          <th><small>Cleaning Service</small></th>
          <th><small>Status</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT cekkebersihankamar.idcekkebersihankamar, cekkebersihankamar.tanggal, cekkebersihankamar.idkamar,kamar.nama as namakamar, CASE cekkebersihankamar.status WHEN '1' THEN 'Sangat Kotor' WHEN '2' THEN 'Cukup Kotor' WHEN '3' THEN 'Sedang Dibersihkan' WHEN '4' THEN 'Telah Dibersihkan' END as status, karyawan.nama FROM cekkebersihankamar,kamar,karyawan WHERE cekkebersihankamar.idkamar = kamar.idkamar AND cekkebersihankamar.idkaryawan = karyawan.idkaryawan");
        while ($d = mysqli_fetch_array($data)) {
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
            <td><small><?= $d['namakamar']; ?></small></td>
            <td><small><?= nama($d['nama']); ?></small></td>
            <td><small><?= $d['status']; ?></small></td>
            <td>
              <small>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idcekkebersihankamar']; ?>" <?= $d['status'] == 'Cukup Kotor' ? 'class="text-dark"' : '' ?>>Ubah</a>
                <a href="../controller/delete/datacekkebersihankamar.php?q=<?= $d['idcekkebersihankamar']; ?>" <?= $d['status'] == 'Cukup Kotor' ? 'class="text-dark"' : '' ?>>Hapus</a>
              </small>
            </td>
          </tr>

          <?php
          // var_dump($d['idkamar']);
          ?>


          <!-- Modal -->
          <div class="modal fade" id="modalUbah<?= $d['idcekkebersihankamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Kamar</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <form action="../controller/update/datacekkebersihankamar.php" method="post">
                    <input type="hidden" name="idcekkebersihankamar" value="<?= $d['idcekkebersihankamar']; ?>">
                    <input type="hidden" name="lokasi" value="<?= $lokasi; ?>">


                    <div class="input-group mb-2">
                      <span class="input-group-text">Tanggal</span>
                      <input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal']; ?>" required>
                    </div>

                    <div class="input-group mb-2">
                      <span class="input-group-text">Kamar</span>
                      <select name="idkamar" class="form-select" required>
                        <?php
                        $id = $d['idkamar'];
                        $dataKamar = query("SELECT * FROM kamar");
                        foreach ($dataKamar as $d2) {
                          if ($id == $d2['idkamar']) {
                            echo "<option selected value='{$d2['idkamar']}'>{$d2['nama']}</option>";
                          } else {
                            echo "<option  value='{$d2['idkamar']}'>{$d2['nama']}</option>";
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