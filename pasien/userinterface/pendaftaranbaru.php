<?php
include "../../template/functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <title>Pendaftaran Pasien Baru</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbarlogin.php"; ?>

  <div class="container">
    <h1>Pendaftaran Pasien Baru </h1>
    <p>silahkan siapkan dokument kependuduka Anda sebelum mengisi formulir pendaftaran berikut ini: </p>
    <div class="row">
      <div class="col-md-4"><img src="../../img/logo.png" alt="" class="img-fluid"></div>
      <div class="col-md-8">

        <form action="../controller/insertpendaftaranbaru.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="text" class="form-control" name="nama" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Tempat Lahir</span>
            <input type="text" class="form-control" name="tempatlahir" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Lahir</span>
            <input type="date" class="form-control" name="tanggallahir" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Jenis Kelamin</span>
            <select name="jeniskelamin" class="form-select" required>
              <option value=""></option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Alamat</span>
            <input type="text" class="form-control" name="alamat" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Telepon</span>
            <input type="number" class="form-control" name="telepon" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Email</span>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Password</span>
            <input type="password" class="form-control" name="password" required>
          </div>

          <div class="d-grid gap-2 col-4 mx-auto">
            <button class="btn btn-success" type="submit">Simpan</button>
            <a href="index.php" class="btn btn-info">Kembali</a>
          </div>
        </form>


      </div>
    </div>


  </div>


  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>