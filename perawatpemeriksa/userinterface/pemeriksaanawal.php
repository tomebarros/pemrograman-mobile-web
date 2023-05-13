<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";

$idrekammedis = $_GET['q'];
$dataPasien = query("SELECT pasien.idpasien,pasien.nama ,pasien.tempatlahir, pasien.tanggallahir,pasien.jeniskelamin,rekammedis.keluhanawal FROM pasien,rekammedis WHERE pasien.idpasien = rekammedis.idpasien AND rekammedis.idrekammedis = '$idrekammedis'")[0];

$datarekammedis = query("SELECT * from rekammedis WHERE idrekammedis = '$idrekammedis'")[0];


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
    <h1>Pemeriksaan Awal</h1>

    <div class="row">
      <div class="col-md-3">

        <div class="toast show">
          <div class="toast-header">
            <strong class="me-auto text-primary">Informasi Pasien</strong>
            <small class="text-muted">ID Rekam Medis : <?= $idrekammedis; ?></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
          </div>
          <div class="toast-body">
            <ul>
              <li>ID Pasien : <?= $dataPasien["idpasien"]; ?> </li>
              <li>Nama : <?= $dataPasien["nama"]; ?> </li>
              <li>Tempat Lahir : <?= $dataPasien['tempatlahir']; ?></li>
              <li>Tanggal Lahir : <?= $dataPasien['tanggallahir']; ?></li>
              <li>Jenis Kelamin : <?= $dataPasien['jeniskelamin']; ?></li>
              <li>Keluhan Awal : <?= $dataPasien['keluhanawal']; ?></li>
            </ul>
          </div>
        </div>

      </div>
      <div class="col-md-8 mx-auto">

        <form action="../controller/updatepemeriksaanawal.php" method="post">
          <input type="hidden" name="idrekammedis" value="<?= $idrekammedis ?>">

          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal Checkin</span>
            <input type="date" class="form-control" name="tanggalcheckin" required value="<?= $datarekammedis['tanggalcheckin'] ?>"> 
          </div> 


          <div class="input-group mb-2">
            <span class="input-group-text">Jam Checkin</span>
            <input type="time" class="form-control" name="jamcheckin"required value="<?= $datarekammedis['jamcheckin'] ?>">
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Tinggi Badan</span>
            <input type="number" class="form-control" name="tb" required value="<?= $datarekammedis['tb'] ?>">
          </div>


          <div class="input-group mb-2">
            <span class="input-group-text">Berat Badan</span>
            <input type="number" class="form-control" name="bb" required value="<?= $datarekammedis['bb'] ?>">
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Suhu</span>
            <input type="number" class="form-control" name="suhu" required value="<?= $datarekammedis['suhu'] ?>">
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Tensi</span>
            <input type="number" class="form-control" name="tensi" required value="<?= $datarekammedis['tensi'] ?>">
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Catatan Hasil Lab</span>
            <input type="text" class="form-control" name="catatanhasillab" required value="<?= $datarekammedis['catatanhasillab'] ?>">
          </div>
          
          <div class="input-group mb-2">
            <span class="input-group-text">Catatan Alergi Makanan</span>
            <input type="text" class="form-control" name="catatanalergimakanan" required value="<?= $datarekammedis['catatanalergimakanan'] ?>">
          </div>
          
          <div class="input-group mb-2">
            <span class="input-group-text">Catatan Alergi Obat</span>
            <input type="text" class="form-control" name="catatanalergiobat" required value="<?= $datarekammedis['catatanalergiobat'] ?>">
          </div>

          <input type="submit" class="btn btn-success" value="Simpan">
        </form>

      </div>
    </div>

  </div>



  <script>
    $('#toastbtn').on('click', function() {
      $('.toast').each(function() {
        var toast = new bootstrap.Toast($(this)[0])
        toast.show()
      })
    })
  </script>
  <script src="../../template/js/script.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>