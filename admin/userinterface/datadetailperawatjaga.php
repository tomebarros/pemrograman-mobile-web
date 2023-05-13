<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Perawat Jaga</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Perawat Jaga</h1>
    <hr>

    <div class="row">
      <div class="col-md-4">

        <form action="" method="post">
          <div class="input-group mb-3">
            <select name="idrawatinap" class="form-select" required>
              <option value="">Silahkan Pilih Pasien Rawat Inap</option>
              <?php
              // ambil nama,tgl lahir, jk dari pasien  idrawatinap yg tgl selesai masih null
              $datarawatinap = query("SELECT pasien.nama,pasien.tanggallahir, pasien.jeniskelamin,rawatinap.idrawatinap FROM pasien,rekammedis,rawatinap WHERE pasien.idpasien = rekammedis.idpasien AND rawatinap.idrekammedis = rekammedis.idrekammedis AND (rawatinap.tanggalselesai is null OR rawatinap.tanggalselesai = '0000-00-00')");
              foreach ($datarawatinap as $rawatinap) : ?>
                <option value="<?= $rawatinap['idrawatinap']; ?>"><?= "{$rawatinap['nama']} | {$rawatinap['tanggallahir']} | {$rawatinap['jeniskelamin']}" ?></option>
              <?php endforeach; ?>
            </select>
            <button class="btn btn-success" type="submit">Go</button>
          </div>
        </form>

        <?php
        if (isset($_POST['idrawatinap'])) {
          $idrawatinap = $_POST['idrawatinap'];
          $datapasien = query("SELECT pasien.nama as namapasien, pasien.alamat, pasien.tempatlahir,pasien.tanggallahir, pasien.jeniskelamin,pasien.telepon, karyawan.nama as namadokter, poli.namapoli FROM pasien, rekammedis,rawatinap,karyawan,poli WHERE rawatinap.idrekammedis = rekammedis.idrekammedis AND rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpoli = poli.idpoli AND rawatinap.idrawatinap = $idrawatinap")[0];
        ?>
          <div class="toast show">
            <div class="toast-header">
              <strong class="me-auto text-primary">Informasi Pasien</strong>
              <small class="text-muted">ID Rawat Inap : <?= $_POST['idrawatinap']; ?></small>
              <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
              <ul>
                <li>Nama : <?= $datapasien['namapasien']; ?></li>
                <li>Alama : <?= $datapasien['alamat']; ?></li>
                <li>Tempat Lahir : <?= $datapasien['tempatlahir']; ?></li>
                <li>Tanggal Lahir : <?= tanggal($datapasien['tanggallahir']); ?></li>
                <li>Jenis Kelamin : <?= $datapasien['jeniskelamin']; ?></li>
                <li>Telepon : <?= $datapasien['telepon']; ?></li>
                <li>Poli : <?= $datapasien['namapoli']; ?></li>
                <li>Dokter : <?= $datapasien['namadokter']; ?></li>
              </ul>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-8">


        <?php if (isset($_POST['idrawatinap'])) { ?>

          <form action="../controller/insert/datadetailperawatjaga.php" method="post">

            <div class="input-group mb-2">
              <span class="input-group-text">Perawat Jaga</span>
              <select name="idkaryawan" class="form-select" required>
                <option value=""></option>
                <?php
                $datakaryawan = query("SELECT * FROM karyawan WHERE pekerjaan = 'Perawat Jaga'");
                foreach ($datakaryawan as $karyawan) {
                ?>
                  <option value="<?= $karyawan['idkaryawan']; ?>"><?= "{$karyawan['nama']} | {$karyawan['email']}" ?></option>
                <?php } ?>
              </select>
            </div>

            <input type="hidden" name="idrawatinap" value="<?= $_POST['idrawatinap'] ?>">

            <input type="submit" class="btn btn-success" value="Simpan">
          </form>

          <?php include '../view/datadetailperawatjaga.php'; ?>
        <?php } ?>

      </div>
    </div>


  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>

</body>

</html>