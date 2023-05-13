<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Pemeriksaan Awal</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Monitoring Pemeriksaan Awal</h1>

    <?php include '../view/monitoringpemeriksaan.php'; ?>
  </div>



  <script src="../../template/js/script.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>