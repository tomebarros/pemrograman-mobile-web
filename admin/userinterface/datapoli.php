<?php
include "../../template/functions.php";
include "../controller/other/restrict.php";


?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Poli</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Poli</h1>

    <div class="row">
      <div class="col-md-4">
        <form action="../controller/insert/datapoli.php" method="post">
          <div class="input-group mb-2">
            <span class="input-group-text">Nama</span>
            <input type="text" class="form-control" name="namapoli" required>
          </div>
          <input type="submit" class="btn btn-success">
        </form>

      </div>
      <div class="col-md-8">

        <?php include '../view/datapoli.php'; ?>

      </div>
    </div>


  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>