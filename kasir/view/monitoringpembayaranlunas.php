  <input class="form-control" id="myInput2" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable2">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>ID Medis</small></th>
          <th><small>Tanggal Pelayanan</small></th>
          <th><small>Pasien</small></th>
          <th><small>No Pasien</small></th>
          <th><small>Total</small></th>
          <th><small>Metode Pembayaran</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT rekammedis.idrekammedis, rekammedis.tanggalpelayanan, pasien.nama, pasien.idpasien, rekammedis.idkaryawankasir, SUM(resep.hargasatuan * resep.jumlah) AS total, CASE rekammedis.metodepembayaran WHEN '1' THEN 'Tunai' WHEN '2' THEN 'Transfer' END AS metodepembayaran FROM rekammedis,pasien,resep,obat WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.metodepembayaran IS NOT null GROUP BY idrekammedis;");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><small><?= $no++; ?></small></td>
            <td><small><?= $d['idrekammedis']; ?></small></td>
            <td><small><?= tanggal($d['tanggalpelayanan']); ?></small></td>
            <td><small><?= nama($d['nama']); ?></small></td>
            <td><small><?= $d['idpasien']; ?></small></td>
            <td><small><?= rupiah($d['total']); ?></small></td>
            <td><small><?= $d['metodepembayaran']; ?></small></td>
            <td>
              <small>
                <a href="#">Cetak Struk</a>
              </small>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


  <script>
    $(document).ready(function() {
      $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable2 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>