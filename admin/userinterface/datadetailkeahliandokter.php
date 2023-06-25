<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>


<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Detail Keahlian Dokter</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>
  <?php include "../aset/navbar.php"; ?>
  <div class="container">
    <h1>Detail Keahlian Dokter</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="alert alert-success">
          <?php
          $q = $_GET['q'];
          $dataDokter = query("SELECT nama,email FROM karyawan WHERE idkaryawan = $q")[0];
          ?>
          <p>Nama : <?= $dataDokter['nama']; ?></p>
          <p>Email : <?= $dataDokter['email']; ?></p>
        </div>
      </div>
      <div class="col-md-8">
        <strong>Silahkan Pilih keahlian Dokter <?= $dataDokter['nama']; ?></strong>
        <hr>
        <form action="../controller/insert/datadetailkeahliandokter.php" method="post">
          <div class="input-group mb-2">
            <span class="input-group-text">Keahlian</span>
            <select name="idkeahliandokter" class="form-select" required>
              <option value=""></option>
              <?php
              $keahlian = query("SELECT * FROM keahliandokter");
              foreach ($keahlian as $d) {
              ?>
                <option value="<?= $d['idkeahliandokter'] ?>"><?= $d['nama']; ?></option>
              <?php } ?>
            </select>
          </div>
          <input type="hidden" name="idkaryawan" value="<?= $q; ?>">
          <input type="submit" class="btn btn-success" value="Tambah">
        </form>
        <?php include '../view/datadetailkeahliandokter.php'; ?>
      </div>
    </div>
  </div>
  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>