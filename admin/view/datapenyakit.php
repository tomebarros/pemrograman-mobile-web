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
          <td>
            <a href="../controller/delete/datapenyakit.php?q=<?= $d['idpenyakit']; ?>" onclick="return confirm('Hapus Data!')">Hapus</a>
            <a href="#" class="btn-ubah" id="modalTargetUbah" nama="<?= $d['nama'] ?>" idpenyakit="<?= $d['idpenyakit'] ?>">Ubah</a>
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
      <form name="Ubah" action="../controller/update/datapenyakit.php" method="POST">

        <input name="idpenyakit" type="text">

        <div class="input">
          <input type="text" class="form-input" required placeholder="Nama Penyakit" name="nama">
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