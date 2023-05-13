<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Kebersihan Kamar</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Cek Kebersihan</h1>
    <hr>
    <div class="row">
      <div class="col-md-4">

        <form action="" method="get">
          <div class="input-group">
            <select name="lokasi" class="form-select" required>
              <option value=""></option>
              <option value="ruang">Ruang</option>
              <option value="kamar">Kamar</option>
            </select>
            <button type="submit" class="btn btn-success">Go</button>
          </div>
        </form>
      </div>

      <div class="col-md-8">
        <?php
        if (isset($_GET['lokasi'])) {
          $lokasi = $_GET['lokasi'];
          if ($lokasi == 'ruang') { ?>
            <form action="../controller/insert/datacekkebersihanruang.php" method="post">
              <strong>Form Ruang</strong>

              <div class="input-group my-2">
                <span class="input-group-text">Tanggal</span>
                <input type="date" name="tanggal" required class="form-control">
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Ruang</span>
                <select name="idruang" class="form-select" required>
                  <option></option>
                  <?php
                  $dataruan = query("SELECT * FROM ruang");
                  foreach ($dataruan as $ruang) {
                  ?>
                    <option value="<?= $ruang['idruang'] ?>"><?= $ruang['namaruang'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Status</span>
                <select name="status" class="form-select" required>
                  <option value=""></option>
                  <option value="1">Sangt Kotor</option>
                  <option value="2">Cukup Kotor</option>
                  <option value="3">Sedang Dibersihkan</option>
                  <option value="4">Bersih</option>
                </select>
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Cleaning Service</span>
                <select name="idkaryawan" class="form-select" required>
                  <option value=""></option>
                  <?php
                  $datakaryawan = query("SELECT * FROM karyawan WHERE pekerjaan = 'Cleaning Service'");
                  foreach ($datakaryawan as $karyawan) {
                  ?>
                    <option value="<?= $karyawan['idkaryawan'] ?>"><?= $karyawan['nama'] . ' | ' . $karyawan['email'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <input type="submit" class="btn btn-success" value="Simpan">
            </form>
            <?php include '../view/datacekkebersihanruang.php'; ?>
          <?php } else { ?>
            <form action="../controller/insert/datacekkebersihankamar.php" method="post">
              <strong>Form Kamar</strong>

              <div class="input-group my-2">
                <span class="input-group-text">Tanggal</span>
                <input type="date" name="tanggal" required class="form-control">
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Kamar</span>
                <select name="idruang" class="form-select" required>
                  <option value=""></option>
                  <?php
                  $datakamar = query("SELECT * FROM kamar");
                  foreach ($datakamar as $kamar) {
                  ?>
                    <option value="<?= $kamar['idkamar'] ?>"><?= $kamar['nama'];  ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Status</span>
                <select name="status" class="form-select" required>
                  <option value=""></option>
                  <option value="1">Sangt Kotor</option>
                  <option value="2">Cukup Kotor</option>
                  <option value="3">Sedang Dibersihkan</option>
                  <option value="4">Bersih</option>
                </select>
              </div>

              <div class="input-group mb-2">
                <span class="input-group-text">Cleaning Service</span>
                <select name="idkaryawan" class="form-select" required>
                  <option value=""></option>
                  <?php
                  $datakaryawan = query("SELECT * FROM karyawan WHERE pekerjaan = 'Cleaning Service'");
                  foreach ($datakaryawan as $karyawan) {
                  ?>
                    <option value="<?= $karyawan['idkaryawan'] ?>"><?= $karyawan['nama'] . ' | ' . $karyawan['email'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <input type="submit" class="btn btn-success" value="Simpan">
            </form>
            <?php include '../view/datacekkebersihankamar.php'; ?>
          <?php } ?>
        <?php } ?>
      </div>

    </div>

  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>