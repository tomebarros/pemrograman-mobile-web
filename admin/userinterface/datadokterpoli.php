<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Dokter Poli</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Dokter Poli</h1>

    <div class="row">
      <div class="col-md-4">

        <div class="alert alert-success">
          <?php
          $q = filter($_GET['q']);
          $namaPoli = query("SELECT namapoli FROM poli WHERE idpoli = $q")[0]['namapoli'];
          echo "Poli : " . $namaPoli;
          ?>
        </div>
      </div>
      <div class="col-md-8">

        <?php
        $cekDokter = count(query("SELECT keahliandokter.idpoli FROM keahliandokter,detailkeahliandokter WHERE keahliandokter.idkeahliandokter = detailkeahliandokter.idkeahliandokter AND keahliandokter.idpoli = $q"));
        // var_dump($cekDokter);
        if ($cekDokter > 0) {
        ?>
          <form action="../controller/insert/datadokterpoli.php" method="post">
            <div class="input-group mb-2">
              <span class="input-group-text">Dokter</span>
              <select name="idkaryawan" class="form-select" required>
                <option value=""></option>
                <?php
                $data = query("SELECT karyawan.nama,karyawan.idkaryawan FROM karyawan,keahliandokter,detailkeahliandokter WHERE karyawan.idkaryawan = detailkeahliandokter.idkaryawan AND detailkeahliandokter.idkeahliandokter = keahliandokter.idkeahliandokter AND keahliandokter.idpoli = $q");
                foreach ($data as $d) { ?>
                  <option value="<?= $d['idkaryawan']; ?>"><?= $d['nama']; ?></option>
                <?php } ?>
              </select>
            </div>
            <input type="hidden" value="<?= $_GET['q']; ?>" name="idpoli">
            <button class="btn btn-success" type="submit">Simpan</button>
          </form>
          <?php include '../view/datadokterpoli.php'; ?>
        <?php } else {
          echo "Dokter Tidak Tersedia!!!";
        } ?>

      </div>
    </div>

  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>