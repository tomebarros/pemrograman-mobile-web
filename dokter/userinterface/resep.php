<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
$idrekammedis = $_GET['q'];
$dataPasien = query("SELECT rekammedis.idrekammedis, rekammedis.idpasien,pasien.nama,pasien.jeniskelamin, pasien.tanggallahir,rekammedis.tanggalpelayanan,rekammedis.keluhanawal,rekammedis.tb,rekammedis.bb,rekammedis.suhu, rekammedis.tensi, rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan,rekammedis.lamasakit,rekammedis.statusperawatan,rekammedis.tanggalkontrol FROM rekammedis, pasien WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis =$idrekammedis;")[0];

?>
<!doctype html>
<html lang="en">

<head>
  <title>Resep</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>
  <?php include "../aset/navbar.php"; ?>
  <div class="container">
    <h1>Resep</h1>
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
      <div class="col-md-6 mx-auto">

        <form action="../controller/insertresep.php" method="post">
          <input type="hidden" name="idrekammedis" value="<?= $idrekammedis; ?>">
          <div class="input-group mb-2">
            <span class="input-group-text">Obat</span>
            <select name="idobat" class="form-select" required>
              <option value=""></option>

              <?php
              $dataobat = query("SELECT * FROM obat WHERE ketersediaan = '1'");
              foreach ($dataobat as $d) {
              ?>
                <option value="<?= $d['idobat'] ?>"><?= $d['namaobat']; ?></option>
              <?php } ?>

            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Dosis</span>
            <input type="text" name="dosis" class="form-control" required>
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Jumlah</span>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
          <input type="submit" class="btn btn-success" value="Tambah">
        </form>

        <?php include '../view/resep.php'; ?>
      </div>
    </div>


  </div>


  <script src="../../template/js/script.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>