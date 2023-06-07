<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Kamar</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Kamar</h1>

    <div class="row">
      <div class="col-md-4">
        <form action="../controller/insert/datakamar.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="text" class="form-control" name="nama" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Kelas</span>
            <select name="kelas" class="form-select" name="kelas" required>
              <option></option>
              <option value="Kelas 1">Kelas 1</option>
              <option value="Kelas 2">Kelas 2</option>
              <option value="Kelas 3">Kelas3</option>
            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Harga</span>
            <input type="number" class="form-control" name="harga" required>
          </div>



          <input type="submit" class="btn btn-success" value="Simpan">
        </form>

      </div>
      <div class="col-md-8">




        <?php include '../view/datakamar.php  '; ?>
      </div>
    </div>

  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>