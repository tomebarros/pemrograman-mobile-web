<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Rekam Medis</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container-fluid">
    <h1>Rekam Medis</h1>

    <?php include '../view/datarekammedis.php'; ?>

  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>