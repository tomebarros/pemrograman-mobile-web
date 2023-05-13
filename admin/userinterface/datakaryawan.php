<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";



?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Karyawan</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Karyawan</h1>
    <hr>

    <div class="row">
      <div class="col-md-4">

        <form action="../controller/insert/datakaryawan.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="text" class="form-control" name="nama" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Temapat Lahir</span>
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
            <span class="input-group-text">Pekerjaan</span>

            <select name="pekerjaan" class="form-select" required>
              <option value=""></option>
              <option value="Admin">Admin</option>
              <option value="Dokter">Dokter</option>
              <option value="Perawat Jaga">Perawat Jaga</option>
              <option value="Perawat Pemeriksa">Perawat Pemeriksa</option>
              <option value="Perawat Pendaftaran">Perawat Pendaftaran</option>
              <option value="Chef">Chef</option>
              <option value="Kasir">Kasir</option>
              <option value="Apoteker">Apoteker</option>
              <option value="Cleaning Service">Cleaning Service</option>
            </select>

          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">Email</span>
            <input type="email" class="form-control" name="email" required>
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Password</span>
            <input type="password" class="form-control" name="password" required>
          </div>

          <input type="submit" class="btn btn-success" value="Simpan">
        </form>
      </div>
      <div class="col-md-8">

        <?php include '../view/datakaryawan.php';

        ?>

      </div>
    </div>



  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>