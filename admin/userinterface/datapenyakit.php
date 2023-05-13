<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";


?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Penyakit</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Penyakit</h1>


    <div class="row">
      <div class="col-md-4">


        <form action="../controller/insert/datapenyakit.php" method="post">

          <div class="input-group mb-2">
            <span class="input-group-text">Penyakit</span>
            <input type="text" class="form-control" name="nama" required>
          </div>

          <input type="submit" value="Simpan" class="btn btn-success">

        </form>
      </div>
      <div class="col-md-8">



        <?php include '../view/datapenyakit.php'; ?>

      </div>
    </div>

  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>