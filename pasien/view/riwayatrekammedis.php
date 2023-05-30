<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Nomor Medis</small></th>
        <th><small>Tanggal Pelayanan</small></th>
        <th><small>Poli</small></th>
        <th><small>Dokter</small></th>
        <th><small>Status Perawatan</small></th>
        <th><small>Metode Pembayaran</small></th>
        <th><small>Jenis Perawatan</small></th>
        <th><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $email = $_SESSION['emailPasien'];
      $idpasien = query("SELECT idpasien FROM pasien WHERE email = '$email'")[0]['idpasien'];
      $data = query("SELECT pasien.idpasien,rekammedis.idrekammedis, rekammedis.tanggalpelayanan, rekammedis.idpoli, poli.namapoli, rekammedis.idkaryawandokter, karyawan.nama,IF (rekammedis.statusperawatan = '0000-00-00', 'Dalam Perawatan', rekammedis.statusperawatan) AS statusperawatan,CASE rekammedis.metodepembayaran WHEN '1' THEN 'Tunai' WHEN '2' THEN 'Transfer' END AS metodepembayaran, CASE rekammedis.jenisperawatan WHEN '1' THEN 'Rawat Inap' WHEN '0' THEN 'Rawat Jalan' END AS jenisperawatan, rekammedis.checkin FROM rekammedis,karyawan,poli,pasien WHERE rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpoli = poli.idpoli AND rekammedis.idpasien=pasien.idpasien AND pasien.idpasien = '$idpasien' ORDER BY rekammedis.tanggalpelayanan");
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= $d['idrekammedis']; ?></small></td>
          <td><small><?= tanggal($d['tanggalpelayanan']); ?></small></td>
          <td><small><?= $d['namapoli']; ?></small></td>
          <td><small><?= $d['nama']; ?></small></td>
          <td><small><?= tanggal($d['statusperawatan']); ?></small></td>
          <td><small><?= is_null($d['metodepembayaran']) ? '-' : $d['metodepembayaran']; ?></small></td>
          <td><small><?= is_null($d['jenisperawatan']) ? '-' : $d['jenisperawatan']; ?></small></td>
          <td>
            <?php if (is_null($d['jenisperawatan'])) { ?>
              <a href="../controller/deletepelayanan.php?q=<?= $d['idrekammedis']; ?>" onclick="return confirm('Hapus Data Rekam Medis')">Hapus</a>
              <?php if (is_null($d['checkin'])) { ?>
                | <a href="../controller/updatecheckin.php?q=<?= $d['idrekammedis'] ?>" onclick="return confirm('Check In Sekarang')">Check In</a>
              <?php } ?>
            <?php } else { ?>
              <a target="_blank" id="resep" href="../../apoteker/userinterface/buktiresep.php?q=<?= $d['idrekammedis']; ?>" class="btn btn-danger btn-sm position-relative"><i class="bi bi-receipt-cutoff"></i></a>
              <a target="_blank" id="nota" href="../../kasir/userinterface/nota.php?q=<?= $d['idrekammedis']; ?>" class="btn btn-danger btn-sm my-2 position-relative"><i class="bi bi-wallet"></i></a>
              <a target="_blank" id="datamedis" href="datarekammedis.php?q=<?= $d['idrekammedis']; ?>" class="btn btn-danger btn-sm position-relative"><i class="bi bi-table"></i></a>
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