<?php
include "../../template/functions.php";
include "../controller/other/restrict.php";

$idpesan = input($_GET['q']);
$dataPesan = query("SELECT * FROM pesan WHERE idpesan = '$idpesan'")[0];
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Isi Pesan | <?= $dataPesan['nama']; ?></title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">

    <div class="row mx-1">

      <div class="col-md-6 border p-3 mt-1">
        <h3>Nomor Pesan <?= $idpesan; ?></h3>
        <ul>
          <li>Nama : <?= $dataPesan['nama']; ?></li>
          <li>Email : <?= $dataPesan['email']; ?></li>
          <li>Judul : <?= $dataPesan['judul']; ?></li>
          <li>Tanggal : <?= tanggal($dataPesan['tanggal']); ?></li>
          <li>Status : <?= $dataPesan['status']; ?></li>
        </ul>
        <h4><?= $dataPesan['judul']; ?></h4>
        <p><?= $dataPesan['isipesan']; ?></p>
      </div>

      <div class="col-md-6 mt-2">
        <form action="">
          <div class="form-floating">
            <textarea class="form-control" required placeholder="Leave a comment here" id="floatingTextarea2" style="min-height: 300px"></textarea>
            <label for="floatingTextarea2">Balas Pesan</label>
          </div>
          <div class="d-grid mt-2">
            <button class="btn btn-success">Kirim</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>