  <input class="form-control" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>Barcode</small></th>
          <th><small>Nama Obat</small></th>
          <th><small>Satuan</small></th>
          <th><small>Wujud</small></th>
          <th><small>Dosis</small></th>
          <th><small>Ketersediaan</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = query("SELECT rekammedis.idrekammedis, rekammedis.idpasien,rekammedis.tanggalpelayanan,rekammedis.idpoli, poli.namapoli, rekammedis.idkaryawandokter, karyawan.nama AS namadokter, pasien.nama AS namapasien,pasien.jeniskelamin, pasien.tanggallahir, obat.namaobat, obat.barcode, obat.satuan, obat.wujud, obat.ketersediaan,resep.dosis FROM resep,rekammedis,pasien,karyawan,poli,obat WHERE rekammedis.idpoli = poli.idpoli AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpasien = pasien.idpasien AND resep.idrekammedis = rekammedis.idrekammedis AND obat.idobat = resep.idobat AND resep.idrekammedis = rekammedis.idrekammedis AND rekammedis.idrekammedis = $idrekammedis;");
        foreach ($data as $d) {
        ?>
          <tr>
            <td><small><?php echo $no++; ?></small></td>
            <td><small><?php echo $d['barcode']; ?></small></td>
            <td><small><?php echo $d['namaobat']; ?></small></td>
            <td><small><?php echo $d['satuan']; ?></small></td>
            <td><small><?php echo $d['wujud']; ?></small></td>
            <td><small><?php echo $d['dosis']; ?></small></td>
            <td><small><?php echo ($d['ketersediaan'] > 0) ? 'Ada' : 'Tidak Ada'; ?></small></td>

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