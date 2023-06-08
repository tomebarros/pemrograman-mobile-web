<?php
include "../../template/functions.php";
include "../controller/other/restrict.php";

$idrekammedis = $_GET['q'];
$dataPasien = query("SELECT rekammedis.idrekammedis, rekammedis.idpasien,pasien.nama,pasien.jeniskelamin, pasien.tanggallahir,rekammedis.tanggalpelayanan,rekammedis.keluhanawal,rekammedis.tb,rekammedis.bb,rekammedis.suhu, rekammedis.tensi, rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan,rekammedis.lamasakit,rekammedis.statusperawatan,rekammedis.tanggalkontrol FROM rekammedis, pasien WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis =$idrekammedis;")[0];

$idapoteker = query("SELECT idkaryawan FROM karyawan WHERE email = '{$_SESSION['emailApoteker']}'")[0]['idkaryawan'];

?>

<!doctype html>
<html lang="en">

<head>
  <title>penyerahan Obat</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Penyerahan Obat</h1>

    <div class="row">
      <div class="col-md-4">

        <div class="toast show">
          <div class="toast-header">
            <strong class="me-auto text-primary">Data Pasien</strong>
            <small class="text-muted">ID Pasien : <?= $dataPasien["idpasien"]; ?></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
          </div>
          <div class="toast-body">
            <ul>
              <li>Nama : <?= $dataPasien["nama"]; ?> </li>
              <li>Jenis Kelamin : <?= $dataPasien["jeniskelamin"]; ?> </li>
              <li>Tanggal Lahir : <?= tanggal($dataPasien["tanggallahir"]); ?> </li>
              <li>Tanggal Pelayanan : <?= tanggal($dataPasien["tanggalpelayanan"]); ?> </li>
              <li>Keluhan Awal : <?= $dataPasien["keluhanawal"]; ?> </li>
              <li>Tingggi Badan : <?= $dataPasien["tb"]; ?> </li>
              <li>Berat Badan : <?= $dataPasien["bb"]; ?> </li>
              <li>Suhu : <?= $dataPasien["suhu"]; ?> </li>
              <li>Tensi : <?= $dataPasien["tensi"]; ?> </li>
              <li>Catatan Hasil Lab: <?= $dataPasien["catatanhasillab"]; ?> </li>
              <li>Catatan Alergi Obat : <?= $dataPasien["catatanalergiobat"]; ?> </li>
              <li>Catatan Alergi Makanan : <?= $dataPasien["catatanalergimakanan"]; ?> </li>
              <li>Jenis Perawatan: <?= ($dataPasien["jenisperawatan"] == '0') ? 'Rawat Jalan' : 'Rawat Inap'; ?> </li>
              <li>Lamasakit: <?= $dataPasien["lamasakit"]; ?> </li>
              <li>Status Perawatan: <?= tanggal($dataPasien["statusperawatan"]); ?> </li>
              <li>Tanggal Kontrol: <?= tanggal($dataPasien["tanggalkontrol"]); ?> </li>
            </ul>
          </div>
        </div>

      </div>
      <div class="col-md-8">
        <?php include '../view/monitoringpenyerahanobat.php'; ?>

        <?php
        $cek = getData("SELECT * FROM resep WHERE idrekammedis = '$idrekammedis' AND idkaryawan IS NULL");
        if ($cek > 0) {
        ?>
          <form action="../controller/updatepenyerahanobat.php" method="post">
            <input type="hidden" value="<?= $idrekammedis; ?>" name="idrekammedis">
            <input type="hidden" value="<?= $idapoteker; ?>" name="idkaryawan">
            <input type="submit" class="btn btn-success" value="Serahkan">
          </form>
        <?php } else { ?>
          <a href="buktiresep.php?q=<?= $idrekammedis; ?>" target="_blank">Cetak Bukti Resep</a>
        <?php } ?>

      </div>
    </div>

  </div>



  <script>
    $('#toastbtn').on('click', function() {
      $('.toast').each(function() {
        var toast = new bootstrap.Toast($(this)[0])
        toast.show()
      })
    })
  </script>
  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>