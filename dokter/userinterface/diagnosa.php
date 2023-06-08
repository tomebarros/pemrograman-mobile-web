<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
$idrekammedis = $_GET['q'];
$dataPasien = query("SELECT rekammedis.idrekammedis, rekammedis.idpasien,pasien.nama,pasien.jeniskelamin, pasien.tanggallahir,rekammedis.tanggalpelayanan,rekammedis.keluhanawal,rekammedis.tb,rekammedis.bb,rekammedis.suhu, rekammedis.tensi, rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan,rekammedis.lamasakit,rekammedis.statusperawatan,rekammedis.tanggalkontrol FROM rekammedis, pasien WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis =$idrekammedis;")[0];

?>

<!doctype html>
<html lang="en">

<head>
  <title>Diagnosa</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Diagnosa</h1>
    <hr>

    <div class="row">
      <div class="col-md-3">

        <div class="toast show">
          <div class="toast-header">
            <strong class="me-auto text-primary">Data Pasien</strong>
            <small class="text-muted">ID Rekam Medis : <?= $idrekammedis; ?></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
          </div>
          <div class="toast-body">
            <ul>
              <li>No Pasien: <?= $dataPasien["idpasien"]; ?> </li>
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
        <div class="d-grid mt-2">
          <a href="pemeriksaanlanjutan.php?q=<?= $idrekammedis; ?>" class="btn btn-info">Kembali</a>
        </div>
      </div>
      <div class="col-md-4 mx-auto">

        <form action="../controller/insertdiagnosa.php" method="post">
          <input type="hidden" name="idrekammedis" value="<?= $idrekammedis; ?>">
          <div class="input-group">
            <select name="idpenyakit" class="form-select" required>
              <option value="">Penyakit</option>
              <?php
              $dataPenyakit = query("SELECT * FROM penyakit");
              foreach ($dataPenyakit as $d) {
              ?>
                <option value="<?= $d['idpenyakit'] ?>"><?= $d['nama']; ?></option>
              <?php } ?>
            </select>
            <button type="submit" class="btn btn-success">Go</button>
          </div>
        </form>

        <?php include '../view/diagnosa.php'; ?>

      </div>


    </div>

  </div>



  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>