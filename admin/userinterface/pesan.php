<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";



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



    <hr>
    <div class="row">
      <div class="col-md-4 ms-auto">
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
          $data = query("SELECT * FROM pesan ORDER BY status,tanggal,keterangan");
          foreach ($data as $d) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $d['nama']; ?></td>
              <td><?= $d['email']; ?></td>
              <td><?= $d['judul']; ?></td>
              <td><?= tanggal($d['tanggal']); ?></td>
              <td>
                <?php if ($d['status'] == '0') { ?>
                  <a href="isipesan.php?q=<?= $d['idpesan']; ?>" class="btn btn-warning btn-sm ">Baca</a>
                <?php } else if ($d['status'] == '1' and $d['keterangan'] == '0') { ?>
                  <a href="isipesan.php?q=<?= $d['idpesan'] ?>" class="btn btn-secondary btn-sm ">Balas</a>
                <?php } ?>
                <?php if ($d['keterangan'] == '1') { ?>
                  <a href="isipesan.php?q=<?= $d['idpesan'] ?>" class="btn btn-success btn-sm ">Baca</a>
                  <a href="../controller/pesan/hapus.php?q=<?= $d['idpesan']; ?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus Pesan')">Hapus</a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

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