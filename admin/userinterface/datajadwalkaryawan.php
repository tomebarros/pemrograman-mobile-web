<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";



?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Jadwal Karyawan</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Jadwal Karyawan</h1>


    <div class="row">
      <div class="col-md-4">
        <form action="../controller/insert/datajadwalkaryawan.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <select name="idkaryawan" class="form-select" name="idkaryawan">
              <option></option>
              <?php
              $karyawan = query("SELECT * FROM karyawan");
              foreach ($karyawan as $krw) : ?>
                <option value="<?= $krw['idkaryawan'] ?>"><?= $krw['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class=" input-group mb-2">
            <span class="input-group-text">Ruang</span>
            <select class="form-select" name="idruang">
              <option></option>
              <?php
              $ruang = query("SELECT * FROM ruang");
              foreach ($ruang as $r) : ?>
                <option value="<?= $r['idruang'] ?>"><?= $r['namaruang']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Hari</span>
            <select name="hari" class="form-select" required>
              <option></option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Mingu</option>
            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Jam Mulai</span>
            <input type="time" class="form-control" name="jammulai" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Jam Selesai</span>
            <input type="time" class="form-control" name="jamselesai" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Status Ketersediaan</span>
            <input type="text" class="form-control" name="statusketersediaan" required>
          </div>

          <input type="submit" class="btn btn-success">
        </form>

      </div>
      <div class="col-md-8">
        <?php include '../view/datajadwalkaryawan.php'; ?>
      </div>
    </div>

    <script src="../../template/js/dark-mode.js"></script>
    <script src="../../template/js/script.js"></script>
</body>

</html>