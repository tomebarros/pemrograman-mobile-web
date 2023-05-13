  <input class="form-control" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>Tanggal Pelayanan</small></th>
          <th><small>No Medis</small></th>
          <th><small>Pasien</small></th>
          <th><small>Tanggal Lahir</small></th>
          <th><small>Jenis Kelamin</small></th>
          <th><small>Poli</small></th>
          <th><small>Dokter</small></th>
          <th><small>Aksi</small></th>
          <th><small>Status</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = query("SELECT DISTINCT rekammedis.idrekammedis, rekammedis.idpasien,rekammedis.tanggalpelayanan,rekammedis.idpoli, poli.namapoli, rekammedis.idkaryawandokter, karyawan.nama AS namadokter, pasien.nama AS namapasien,pasien.jeniskelamin, pasien.tanggallahir FROM resep,rekammedis,pasien,karyawan,poli WHERE rekammedis.idpoli = poli.idpoli AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpasien = pasien.idpasien AND resep.idrekammedis = rekammedis.idrekammedis;");
        foreach ($data as $d) {
        ?>
          <tr>
            <td><small><?= $no++; ?></small></td>
            <td><small><?= tanggal($d['tanggalpelayanan']); ?></small></td>
            <td><small><?= $d['idrekammedis']; ?></small></td>
            <td><small><?= $d['namapasien']; ?></small></td>
            <td><small><?= tanggal($d['tanggallahir']); ?></small></td>
            <td><small><?= $d['jeniskelamin']; ?></small></td>
            <td><small><?= $d['namapoli']; ?></small></td>
            <td><small><?= $d['namadokter']; ?></small></td>
            <td>
              <small>
                <a href="penyerahanobat.php?q=<?= $d['idrekammedis']; ?>">Penyerahan Obat</a>
              </small>
            </td>

            <td>

              <?php
              $cek = getData("SELECT * FROM resep WHERE idrekammedis = '{$d['idrekammedis']}' AND idkaryawan IS NULL");
              if ($cek == 0) {
              ?>
                <i class="bi bi-check-circle-fill text-success"></i>
              <?php } ?>

            </td>
          </tr>

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