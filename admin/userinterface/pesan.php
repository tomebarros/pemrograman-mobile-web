<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
$data = query("SELECT * FROM pesan ORDER BY status,tanggal");
$cekBalasPesan = getData("SELECT * FROM pesan WHERE status is null");
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Karyawan</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Pesan</h1>

    <?php if (count($data) > 0) { ?>
      <hr>
      <div class="row justify-content-end">
        <?php if ($cekBalasPesan > 0) { ?>
          <div class="col-md-3">
            <p class="d-flex justify-content-center mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">Ada pesan baru yang belum dibaca</p>
          </div>
        <?php } ?>
        <div class="col-md-4">
          <input class="form-control" id="myInput" type="search" placeholder="Cari..">
        </div>
      </div>

      <div class="table-responsive mt-2">
        <table class="table table-striped table-hover table-sm">
          <thead>
            <tr>
              <th class="col-1">No</th>
              <th class="col-3">Nama</th>
              <th class="col-3">Email</th>
              <th class="col-2">Judul</th>
              <th class="col-1">Tanggal</th>
              <th class="col-2">Aksi</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
            $no = 1;
            foreach ($data as $d) {
              $cekPesan = getData("SELECT * FROM pesan,detailpesan WHERE pesan.idpesan = detailpesan.idpesan AND detailpesan.idpesan = {$d['idpesan']} ORDER BY status,tanggal"); ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['email']; ?></td>
                <td><?= $d['judul']; ?></td>
                <td><?= tanggal($d['tanggal']); ?></td>
                <td>
                  <?php if ($cekPesan == 0 and !is_null($d['status'])) { ?>
                    <a href="isipesan.php?q=<?= $d['idpesan'] ?>" class="btn btn-secondary btn-sm">Balas</a>
                  <?php } elseif (is_null($d['status'])) { ?>
                    <a href="isipesan.php?q=<?= $d['idpesan'] ?>" class="btn btn-warning btn-sm" title="Belum Baca">Baca</a>
                  <?php } ?>

                  <?php if ($cekPesan > 0) { ?>
                    <a href="isipesan.php?q=<?= $d['idpesan'] ?>" class="btn btn-success btn-sm ">Baca</a>
                    <a href="../controller/pesan/hapus.php?q=<?= $d['idpesan']; ?>" class="btn btn-danger btn-sm " onclick="return confirm('Hapus Pesan')">Hapus</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <?php } else {
      echo "<h4 class='text-center'>Belum Ada Pesan terbaru </h4>";
    } ?>
  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>