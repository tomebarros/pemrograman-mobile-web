<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Monitorin Pembayaran</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container-fluid">
    <h1>Monitorin Pembayaran</h1>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <?php
        $cek = getData("SELECT * FROM resep WHERE idkaryawan IS NULL");
        if ($cek > 0) {
          include '../view/monitoringpembayaran.php';
        } else {
          echo "<h4 class='text-center'>Pembayaran Baru Belum Tersedia</h4>";
        } ?>
      </div>
      <div class="col-md-6">
        <?php include '../view/monitoringpembayaranlunas.php'; ?>
      </div>
    </div>


  </div>


  <script src="../../template/js/script.js"></script>
</body>

</html>