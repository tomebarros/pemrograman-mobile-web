<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM penyakit"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT * FROM penyakit ORDER BY nama LIMIT $awalData,$jumlahDataPerHalaman");


if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
  $query = "SELECT * FROM penyakit WHERE
          nama LIKE '%$keyword%'
          ORDER BY nama ASC
  ";

  $data = query($query);
}
?>
<form action="" method="post">
  <div class="input-group mt-2">
    <input class="form-control" name="keyword" type="search" placeholder="Cari.." value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" autofocus>
    <button name="cari" class="btn btn-primary"><i class="bi bi-search"></i></button>
  </div>
</form>
<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Nama Penyakit</small></th>
        <th><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= $d['nama']; ?></small></td>
          <td>
            <small>
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idpenyakit']; ?>">Ubah</a>
              <a href="../controller/delete/datapenyakit.php?q=<?= $d['idpenyakit']; ?>">Hapus</a>
            </small>
          </td>
        </tr>


        <!-- Modal -->
        <div class="modal fade" id="modalUbah<?= $d['idpenyakit']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/datapenyakit.php" method="post">
                  <input type="hidden" value="<?= $d['idpenyakit']; ?>" name="idpenyakit">

                  <div class="input-group mb-2">
                    <span class="input-group-text">Nama Penyakit</span>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                  </div>

              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>



      <?php } ?>
    </tbody>
  </table>
</div>
<?php include "../../template/navtab.php"; ?>