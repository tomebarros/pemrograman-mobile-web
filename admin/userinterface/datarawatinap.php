<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";



?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Rawat Inap</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Rawat Inap</h1>
    <hr>

    <div class="row">
      <div class="col-md-4">

        <form action="" method="post">
          <div class="input-group mb-3">
            <select name="idrekammedis" class="form-select" required>
              <option value="">Silahkan Pilih Pasien</option>
              <?php
              $pasienrawatinap = query("SELECT pasien.nama, pasien.tanggallahir, rekammedis.idrekammedis FROM pasien,rekammedis WHERE pasien.idpasien = rekammedis.idpasien AND rekammedis.jenisperawatan = 1");
              foreach ($pasienrawatinap as $d) : ?>
                <option value="<?= $d['idrekammedis']; ?>"><?= "{$d['nama']}  | {$d['tanggallahir']}"; ?></option>
              <?php endforeach; ?>
            </select>
            <button class="btn btn-success" type="submit">Go</button>
          </div>
        </form>

        <?php
        if (isset($_POST['idrekammedis'])) {
          $idrekammedis = $_POST['idrekammedis'];
          $datapasien = query("SELECT * FROM rekammedis,pasien WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis= $idrekammedis")[0];
          $datadokter = query("SELECT karyawan.nama FROM karyawan,rekammedis WHERE rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idrekammedis = $idrekammedis")[0];
          $datapoli = query("SELECT poli.namapoli FROM rekammedis, poli WHERE rekammedis.idpoli = poli.idpoli AND rekammedis.idrekammedis = $idrekammedis")[0];
        ?>

          <div class="toast show">
            <div class="toast-header">
              <strong class="me-auto text-primary">Informasi Pasien</strong>
              <small class="text-muted">ID Rekam Medis : <?= $idrekammedis; ?></small>
              <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
              <ul>
                <li>Nama : <?= $datapasien["nama"]; ?> </li>
                <li>Alamat : <?= $datapasien['alamat']; ?></li>
                <li>Tempat Lahir : <?= $datapasien['tempatlahir']; ?></li>
                <li>Tanggal Lahir : <?= tanggal($datapasien['tanggallahir']); ?></li>
                <li>Jenis Kelamin : <?= $datapasien['jeniskelamin']; ?></li>
                <li>Telepon : <?= $datapasien['telepon']; ?></li>
                <li>Poli : <?= $datapoli['namapoli']; ?></li>
                <li>Dokter : <?= $datadokter['nama']; ?></li>
              </ul>
            </div>
          </div>
        <?php } ?>

      </div>

      <div class="col-md-8">
        <?php
        if (isset($_POST['idrekammedis'])) {
        ?>

          <form action="../controller/insert/datarawatinap.php" method="post">
            <div class="input-group mb-2">
              <span class="input-group-text">Tanggal Mulai</span>
              <input type="date" class="form-control" name="tanggalmulai" required>
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Tanggal Selesai</span>
              <input type="date" class="form-control" name="tanggalselesai">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Kamar</span>

              <select name="idkamar" class="form-select" required>
                <option value="">Silahkan Pilih Kamar</option>
                <?php
                $datakamar = query("SELECT * FROM kamar ORDER BY kelas ASC");
                foreach ($datakamar as $kamar) {
                ?>
                  <option value="<?= $kamar['idkamar']; ?>"><?= "{$kamar['nama']} | {$kamar['kelas']} | {$kamar['harga']}"; ?></option>
                <?php } ?>
              </select>
            </div>


            <?php
            $email = $_SESSION['emailAdmin'];
            $idkaryawan = query("SELECT idkaryawan FROM karyawan WHERE email = '$email'")[0];
            ?>
            <input type="hidden" name="idrekammedis" value="<?= $idrekammedis; ?>">
            <input type="hidden" name="idkaryawan" value="<?= $idkaryawan['idkaryawan']; ?>">

            <input type="submit" class="btn btn-success" value="Simpan">

          </form>
        <?php } ?>
      </div>
    </div>

    <div class="row">
      <div class="col">


        <?php include '../view/datarawatinap.php'; ?>
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

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>