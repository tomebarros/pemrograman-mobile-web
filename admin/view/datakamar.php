<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM kamar"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$data = query("SELECT * FROM kamar ORDER BY nama");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = input($_POST['keyword']);
  $query = "SELECT * FROM kamar WHERE
          nama LIKE '%$keyword%' OR
          kelas LIKE '%$keyword%' OR
          harga LIKE '%$keyword%'
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
        <th><small>Nama</small></th>
        <th><small>Kelas</small></th>
        <th class="text-end"><small>Harga</small></th>
        <th class="text-end"><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= nama($d['nama']); ?></small></td>
          <td><small><?= $d['kelas']; ?></small></td>
          <td class="text-end"><small><?= rupiah($d['harga']); ?></small></td>
          <td class="text-end"><small>
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idkamar']; ?>">Ubah</a>
              <a href="../controller/delete/datakamar.php?q=<?= $d['idkamar']; ?>">Hapus</a>
            </small>
          </td>
        </tr>


        <!-- Modal -->
        <div class="modal fade" id="modalUbah<?= $d['idkamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/datakamar.php" method="post">
                  <input type="hidden" name="idkamar" value="<?= $d['idkamar']; ?>">

                  <div class="input-group mb-2">
                    <span class="input-group-text">Nama Kamar</span>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Kelas</span>
                    <select name="kelas" class="form-select" required>
                      <option value="1" <?= $d['kelas'] == '1' ?  "selected" : '' ?>>1</option>
                      <option value="2" <?= $d['kelas'] == '2' ? "selected" : '' ?>>2</option>
                      <option value="3" <?= $d['kelas'] == '3' ?  "selected" : '' ?>>3</option>
                    </select>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Harga</span>
                    <input type="number" name="harga" class="form-control" value="<?= $d['harga']; ?>" required>
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