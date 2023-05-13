<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Keahlian Dokter</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Keahlian Dokter</h1>

    <div class="row">
      <div class="col-md-4">


        <form action="../controller/insert/datakeahliandokter.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="text" class="form-control" name="nama" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Biaya</span>
            <input type="number" class="form-control" name="biaya" required>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Poli</span>
            <select name="idpoli" class="form-select" required>
              <option value=""></option>
              <?php
              $dataPoli = query("SELECT * FROM poli");
              foreach ($dataPoli as $poli) {
              ?>
                <option value="<?= $poli['idpoli'] ?>"><?= $poli['namapoli']; ?></option>
              <?php } ?>
            </select>
          </div>

          <input type="submit" class="btn btn-success" value="Simpan">



        </form>
      </div>
      <div class="col-md-8">



        <?php include '../view/datakeahliandokter.php'; ?>



      </div>
    </div>


  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>