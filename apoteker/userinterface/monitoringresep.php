<?php
include "../../template/functions.php";
include "../controller/other/restrict.php";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Monitorin Resep</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Monitorin Resep</h1>

    <div class="row">
      <div class="col-md">
        <?php include '../view/monitorinresep.php'; ?>
      </div>
    </div>

  </div>


  <script src="../../template/js/script.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>