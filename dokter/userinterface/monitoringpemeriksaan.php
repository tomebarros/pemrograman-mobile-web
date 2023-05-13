<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!doctype html>
<html lang="en">

<head>
  <title>Monitorin Pemeriksaan</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">

    <h1>Monitoring Pemeriksaan</h1>
    <div class="row">
      <div class="col-md-12">
        <?php include '../view/monitoringpemeriksaan.php'; ?>
      </div>
    </div>


  </div>



  <script src="../../template/js/script.js"></script>
</body>

</html>