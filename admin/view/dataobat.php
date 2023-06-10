<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM obat"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT idobat,barcode,namaobat,hargasatuan,satuan,wujud, if(ketersediaan = '0', 'Tidak Ada', 'Ada') AS ketersediaan FROM obat ORDER BY namaobat ASC LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = input($_POST['keyword']);
  $query = "SELECT idobat, barcode, namaobat, hargasatuan, satuan, wujud, IF(ketersediaan = 0,'Tidak Ada', 'Ada') AS ketersediaan FROM obat WHERE 
        barcode LIKE '%$keyword%' OR
        namaobat LIKE '%$keyword%' OR 
        hargasatuan LIKE '%$keyword%' OR 
        wujud LIKE '%$keyword%' OR 
        ketersediaan LIKE '%$keyword%';
  ";

  $data = query($query);
}

?>
<form action="" method="post">
  <div class="input-group mt-2">
    <input class="form-control" name="keyword" type="search" placeholder="Cari.." autofocus>
    <button name="cari" class="btn btn-primary"><i class="bi bi-search"></i></button>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Barcode</small></th>
        <th><small>Nama</small></th>
        <th><small>Harga Satuan</small></th>
        <th><small>Satuan</small></th>
        <th><small>Wujud</small></th>
        <th><small>Ketersediaan</small></th>
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
          <td><small><?= $d['barcode']; ?></small></td>
          <td><small><?= $d['namaobat']; ?></small></td>
          <td><small><?= rupiah($d['hargasatuan']); ?></small></td>
          <td><small><?= $d['satuan']; ?></small></td>
          <td><small><?= $d['wujud']; ?></small></td>
          <td><small><?= $d['ketersediaan']; ?></small></td>
          <td><small>
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idobat']; ?>">Ubah</a>
              <a href="../controller/delete/dataobat.php?q=<?= $d['idobat']; ?>">Hapus</a>
            </small>
          </td>
        </tr>


        <!-- Modal -->
        <div class="modal fade" id="modalUbah<?= $d['idobat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/dataobat.php" method="post">
                  <input type="hidden" name="idobat" value="<?= $d['idobat']; ?>">
                  <div class="input-group mb-2">
                    <span class="input-group-text">Barcode</span>
                    <input type="number" name="barcode" class="form-control" value="<?= $d['barcode']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Nama Obat</span>
                    <input type="text" name="namaobat" class="form-control" value="<?= $d['namaobat']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Harga</span>
                    <input type="number" name="hargasatuan" class="form-control" value="<?= $d['hargasatuan']; ?>" required>
                  </div>


                  <div class="input-group mb-2">
                    <span class="input-group-text">Satuan</span>
                    <select name="satuan" required class="form-select">
                      <option value="Mg" <?= $d['satuan'] == 'Mg' ? 'selected' : '' ?>>Mg</option>
                      <option value="Gram" <?= $d['satuan'] == 'Gram' ? 'selected' : '' ?>>Gram</option>
                      <option value="Ml" <?= $d['satuan'] == 'Ml' ?  'selected' : '' ?>>Ml</option>
                      <option value="Liter" <?= $d['satuan'] == 'Liter' ?  'selected' : '' ?>>Liter</option>
                      <option value="Pcs" <?= $d['satuan'] == 'Pcs' ?  'selected' : '' ?>>Pcs</option>
                    </select>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Wujud</span>
                    <select name="wujud" required class="form-select">
                      <option value="Padat" <?= $d['wujud'] == 'Padat' ?  'selected' : '' ?>>Padat</option>
                      <option value="Cair" <?= $d['wujud'] == 'Cair' ? 'selected' : '' ?>>Cair</option>
                      <option value="Gas" <?= $d['wujud'] == 'Gas' ? 'selected' : '' ?>>Gas</option>
                      <option value="Tablet" <?= $d['wujud'] == 'Tablet' ? 'selected' : '' ?>>Tablet</option>
                      <option value="Kapsul" <?= $d['wujud'] == 'Kapsul' ? 'selected' : '' ?>>Kapsul</option>
                    </select>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Ketersediaan</span>
                    <select name="ketersediaan" required class="form-select">
                      <option value="0" <?= $d['ketersediaan'] == 'Tidak Ada' ?  'selected' : '' ?>>Tidak Ada</option>
                      <option value="1" <?= $d['ketersediaan'] == 'Ada' ? 'selected' : '' ?>>Ada</option>
                    </select>
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