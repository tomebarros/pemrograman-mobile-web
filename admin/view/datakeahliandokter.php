<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM keahliandokter"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT * FROM keahliandokter ORDER BY nama ASC LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
  $query = "SELECT * FROM keahliandokter WHERE
          nama LIKE '%$keyword%' OR
          biaya LIKE '%$keyword%'
  ";
  $data = query($query);
}

?>

<form action="" method="post">
  <div class="input">
    <input type="search" class="form-input" placeholder="Cari" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" autofocus />
    <button type="submit" name="cari" hidden>ok</button>
  </div>
</form>
<div class="table">
  <table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
      <th>No</th>
      <th>Nama</th>
      <th>Biaya</th>
      <th>aksi</th>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <th><?= $no++; ?></th>
          <td><?= $d['nama']; ?></td>
          <td><?= rupiah($d['biaya']); ?></td>
          <td>
            <a href="../controller/delete/datakeahliandokter.php?q=<?= $d['idkeahliandokter']; ?>" onclick="return confirm('Hapus Data!')">Hapus</a>
            <a href="#" class="btn-ubah" id="modalTargetUbah" nama="<?= $d['nama'] ?>" biaya="<?= $d['biaya'] ?>" idpoli="<?= $d['idpoli'] ?>" idkeahliandokter="<?= $d['idkeahliandokter'] ?>">Ubah</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

<div class="modal" id="modalUbah">
  <div class="modal-content">
    <div class="modal-header">
      <h3>Ubah Data</h3>
      <i class="fas fa-close" id="iconModalTutupUbah"></i>
    </div>
    <div class="modal-body">
      <form name="Ubah" action="../controller/update/datakeahliandokter.php" method="POST">

        <input name="idkeahliandokter" type="hidden">

        <div class="input">
          <input type="text" class="form-input" required placeholder="Nama Keahliam" name="nama">
        </div>

        <div class="input">
          <input type="text" class="form-input" required placeholder="Biaya" name="biaya">
        </div>

        <div class="input">
          <select name="idpoli" class="form-select" required>
            <?php
            $id = '1';
            $dataPoli = query("SELECT * FROM poli");
            foreach ($dataPoli as $d2) {
              if ($d2['idpoli'] == $id) {
                echo "<option selected value='{$d2['idpoli']}'>{$d2['namapoli']}</option>";
              } else {
                echo "<option value='{$d2['idpoli']}'>{$d2['namapoli']}</option>";
              }
            }
            ?>
          </select>
        </div>

    </div>
    <div class="modal-footer">
      <button class="tombol btn-tutup" type="submit">Simpan</button>
      </form>
      <button class="tombol btn-tutup" type="button" id="tutupModalUbah">Tutup</button>
    </div>
  </div>
</div>
<?php include '../../template/pagination.php'; ?>