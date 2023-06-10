<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM ruang"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT * FROM ruang  ORDER BY namaruang ASC LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = input($_POST['keyword']);
  $query = "SELECT * FROM ruang WHERE
          namaruang LIKE '%$keyword%'
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
      <th>Nama Ruang</th>
      <th>aksi</th>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <th><?= $no++; ?></th>
          <td><?= $d['namaruang']; ?></td>
          <td>
            <a href="../controller/delete/dataruang.php?q=<?= $d['idruang']; ?>" onclick="return confirm('Hapus Data!')">Hapus</a>
            <a href="#" class="btn-ubah" id="modalTargetUbah" namaruang="<?= $d['namaruang'] ?>" idruang="<?= $d['idruang'] ?>">Ubah</a>
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
      <form name="Ubah" action="../controller/update/dataruang.php" method="POST">

        <input name="idruang" type="hidden">

        <div class="input">
          <input type="text" class="form-input" required placeholder="Nama Ruang" name="namaruang">
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