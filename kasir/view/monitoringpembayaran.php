  <input class="form-control" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>No Medis</small></th>
          <th><small>Tanggal Pelayanan</small></th>
          <th><small>Nama Pasien</small></th>
          <th><small>No Pasien</small></th>
          <th><small>Total</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT rekammedis.idrekammedis, rekammedis.tanggalpelayanan, pasien.nama, pasien.idpasien, rekammedis.idkaryawankasir, SUM(resep.hargasatuan * resep.jumlah) AS total, rekammedis.metodepembayaran FROM rekammedis,pasien,resep,obat WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.metodepembayaran IS null GROUP BY idrekammedis;");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><small><?= $no++; ?></small></td>
            <td><small><?= $d['idrekammedis']; ?></small></td>
            <td><small><?= tanggal($d['tanggalpelayanan']); ?></small></td>
            <td><small><?= nama($d['nama']); ?></small></td>
            <td><small><?= $d['idpasien']; ?></small></td>
            <td><small><?= rupiah($d['total']); ?></small></td>
            <td>
              <small>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalBayar<?= $d['idrekammedis'] ?>">Bayar</a>
              </small>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="modalBayar<?= $d['idrekammedis'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran Nomor Medis <?= $d['idrekammedis']; ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <ol>

                    <?php
                    $gt = 0;
                    $dataMedis = query("SELECT rekammedis.idrekammedis, rekammedis.tanggalpelayanan,pasien.idpasien,pasien.nama, resep.idobat, obat.namaobat, resep.hargasatuan, resep.jumlah, resep.hargasatuan * resep.jumlah AS total, resep.dosis FROM rekammedis,pasien,resep,obat WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis = resep.idrekammedis AND obat.idobat = resep.idobat AND rekammedis.idrekammedis = {$d['idrekammedis']}");
                    foreach ($dataMedis as $d2) {
                      $gt += $d2['total'];
                    ?>
                      <li><?= $d2['namaobat'] . " : " . rupiah($d2['hargasatuan']) . " x " . $d2['jumlah'] . "=" . rupiah($d2['total']); ?></li>
                    <?php } ?>
                  </ol>
                  <p>Total Pembayaran <?= rupiah($gt); ?></p>
                  <p>Terbilang : <?= ucwords(terbilang($gt)); ?> Rupiah</p>

                  <form action="../controller/updatepembayaran.php" method="post">
                    <input type="hidden" value="<?= $d['idrekammedis']; ?>" name="idrekammedis">
                    <div class="input-group mb-2">
                      <span class="input-group-text">Metode</span>
                      <select name="metodepembayaran" class="form-select" required>
                        <option value=""></option>
                        <option value="1">Tunai</option>
                        <option value="2">Transfer</option>
                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="Bayar">
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