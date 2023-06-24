<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Rekam Medis</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&amp;display=swap" rel="stylesheet" />

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="../aset/css/style.css" />
  <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
  <style>
    .container .content .kanan {
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include '../aset/nav.php'; ?>
    <div class="content">
      <?php include '../aset/header.php'; ?>
      <div class="header">
        <h1>Data Rekammedis</h1>
        <i class="fa-solid fa-chevrons"></i>
      </div>

      <div class="row">
        <div class="kanan">
          <?php include '../view/datarekammedis.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <script src="../aset/js/script.js"></script>

</body>

</html>