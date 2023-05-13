<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";


?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Obat</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Obat</h1>


    <div class="row">
      <div class="col-md-4">


        <form action="../controller/insert/dataobat.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Barcode</span>
            <input type="number" class="form-control" name="barcode" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Nama Obat</span>
            <input type="text" class="form-control" name="namaobat" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Harga Satuan</span>
            <input type="number" class="form-control" name="hargasatuan" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Satuan</span>
            <select name="satuan" class="form-select" required>
              <option value=""></option>
              <option value="mg">mg</option>
              <option value="gram">gram</option>
              <option value="ml">ml</option>
              <option value="liter">liter</option>
              <option value="pcs">pcs</option>
            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Wujud</span>
            <select name="wujud" class="form-select" required>
              <option value=""></option>
              <option value="Padat">Padat</option>
              <option value="Cair">Cair</option>
              <option value="Gas">Gas</option>
            </select>
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Ketersediaan</span>
            <select name="ketersediaan" class="form-select" required>
              <option value=""></option>
              <option value="Ada">Ada</option>
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>


          <input type="submit" class="btn btn-success" value="Simpan">

        </form>
      </div>
      <div class="col-md-8" id="data">



        <?php include '../view/dataobat.php'; ?>
      </div>
    </div>


  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>