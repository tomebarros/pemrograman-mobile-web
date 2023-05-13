<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";

$idrekammedis = $_GET['q'];
$cekID = getData("SELECT * FROM rekammedis WHERE idrekammedis = $idrekammedis");
if (!$cekID) {
  header("location: monitoringpemeriksaan.php");
  exit();
}

$dataPasien = query("SELECT rekammedis.idrekammedis, rekammedis.idpasien,pasien.nama,pasien.jeniskelamin, pasien.tanggallahir,rekammedis.tanggalpelayanan,rekammedis.keluhanawal,rekammedis.tb,rekammedis.bb,rekammedis.suhu, rekammedis.tensi, rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan,rekammedis.lamasakit,rekammedis.statusperawatan,rekammedis.tanggalkontrol FROM rekammedis, pasien WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis =$idrekammedis;")[0];

?>

<!doctype html>
<html lang="en">

<head>
  <title>Pemeriksaan Lanjutan</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Pemeriksaan Lanjutan</h1>
    <hr>
    <div class="row gap-5">
      <div class="col-md-3">

        <div class="toast show mb-1">
          <div class="toast-header">
            <strong class="me-auto text-primary">Data Pasien</strong>
            <small class="text-muted">No Medis : <?= $idrekammedis; ?></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
          </div>
          <div class="toast-body">
            <ul>
              <li>No Pasien: <?= $dataPasien["idpasien"]; ?> </li>
              <li>Nama : <?= $dataPasien["nama"]; ?> </li>
              <li>Jenis Kelamin : <?= $dataPasien["jeniskelamin"]; ?> </li>
              <li>Tanggal Lahir : <?= tanggal($dataPasien["tanggallahir"]); ?> </li>
              <li>Tanggal Pelayanan : <?= tanggal($dataPasien["tanggalpelayanan"]); ?> </li>
              <li>Keluhan Awal : <?= $dataPasien["keluhanawal"]; ?> </li>
              <li>Tingggi Badan : <?= $dataPasien["tb"]; ?> </li>
              <li>Berat Badan : <?= $dataPasien["bb"]; ?> </li>
              <li>Suhu : <?= $dataPasien["suhu"]; ?> </li>
              <li>Tensi : <?= $dataPasien["tensi"]; ?> </li>
              <li>Catatan Hasil Lab: <?= $dataPasien["catatanhasillab"]; ?> </li>
              <li>Catatan Alergi Obat : <?= $dataPasien["catatanalergiobat"]; ?> </li>
              <li>Catatan Alergi Makanan : <?= $dataPasien["catatanalergimakanan"]; ?> </li>
              <li>Jenis Perawatan: <?= ($dataPasien["jenisperawatan"] == '0') ? 'Rawat Jalan' : 'Rawat Inap'; ?> </li>
              <li>Lamasakit: <?= $dataPasien["lamasakit"]; ?> </li>
              <li>Status Perawatan: <?= tanggal($dataPasien["statusperawatan"]); ?> </li>
              <li>Tanggal Kontrol: <?= tanggal($dataPasien["tanggalkontrol"]); ?> </li>
            </ul>
          </div>
        </div>

        <?php
        $jumlahPenyakit = getData("SELECT * FROM detailpenyakit WHERE idrekammedis = '$idrekammedis'");
        $jumlahResep = getData("SELECT * FROM resep WHERE idrekammedis = '$idrekammedis'");
        ?>

        <div class="d-grid gap-2">
          <a href="diagnosa.php?q=<?= $idrekammedis; ?>" class="btn btn-info position-relative">
            Diagnosa
            <?php if ($jumlahPenyakit > 0) { ?>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $jumlahPenyakit; ?>
              </span>
            <?php } ?>
          </a>

          <a href="resep.php?q=<?= $idrekammedis; ?>" class="btn btn-info position-relative">
            Resep
            <?php if ($jumlahResep > 0) { ?>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $jumlahResep; ?>
              </span>
            <?php } ?>
          </a>

        </div>

      </div>



      <div class="col-md-4 mx-auto">
        <form action="../controller/updatepemeriksaanlanjutan.php" method="post">
          <input type="hidden" name="idrekammedis" value="<?= $idrekammedis; ?>">

          <div class="input-group mb-2">
            <span class="input-group-text">Jenis Perawatan</span>
            <select name="jenisperawatan" class="form-select" required>
              <option value=""></option>
              <option value="0" <?php if ($dataPasien['jenisperawatan'] == '0') echo 'selected'; ?>>Rawat Jalan</option>
              <option value="1" <?php if ($dataPasien['jenisperawatan'] == '1') echo 'selected'; ?>>Rawat Inap</option>

            </select>
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Lama Sakit</span>
            <input type="number" class="form-control" required name="lamasakit" value="<?= $dataPasien['lamasakit'] ?>">
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Status Perawatan</span>
            <input type="date" class="form-control" name="statusperawatan" value="<?= $dataPasien['statusperawatan'] ?>">
          </div>

          <div class="input-group mb-2">
            <span class="input-group-text">Tanggal kontrol</span>
            <input type="date" class="form-control" required name="tanggalkontrol" value="<?= $dataPasien['tanggalkontrol'] ?>">
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
</body>

</html>