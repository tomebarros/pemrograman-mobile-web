<?php

$jumlahDataPerHalaman = 10; // jumlah data yg ingn di tamoilkan
$jumlahData = count(query("SELECT * FROM pasien")); // menghitun ad berapa data di tabel karyawan
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); // membuat jumlah navtab
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1; // default navtab yg aktif adalah satu
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman; // menentukan awal data


$data = query("SELECT * FROM pasien  ORDER BY nama ASC LIMIT $awalData,$jumlahDataPerHalaman"); // query data tampilkan ke tabel



if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
  $query = "SELECT * FROM pasien WHERE
          nama LIKE '%$keyword%' OR
          tempatlahir LIKE '%$keyword%' OR
          tanggallahir LIKE '%$keyword%' OR
          jeniskelamin LIKE '%$keyword%' OR
          alamat LIKE '%$keyword%' OR
          telepon LIKE '%$keyword%' OR
          email LIKE '%$keyword%'
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
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>jenis kelamin</th>
      <th>alamat</th>
      <th>telepon</th>
      <th>email</th>
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
          <td><?= $d['tempatlahir']; ?></td>
          <td><?= tanggal($d['tanggallahir']); ?></td>
          <td><?= $d['jeniskelamin']; ?></td>
          <td><?= $d['alamat']; ?></td>
          <td><?= $d['telepon']; ?></td>

          <td><?= $d['email']; ?></td>
          <td>
            <a href="../controller/delete/datapasien.php?q=<?= $d['idpasien']; ?>" onclick="return confirm('Hapus Data!')">Hapus</a>
            <a href="#" class="btn-ubah" id="modalTargetUbah" nama="<?= $d['nama'] ?>" tempatlahir="<?= $d['tempatlahir'] ?>" tanggallahir="<?= $d['tanggallahir'] ?>" jeniskelamin="<?= $d['jeniskelamin'] ?>" alamat="<?= $d['alamat'] ?>" telepon="<?= $d['telepon'] ?>" pekerjaan="<?= $d['pekerjaan'] ?>" email="<?= $d['email'] ?>" password="<?= $d['password'] ?>" idpasien="<?= $d['idpasien'] ?>">Ubah</a>
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
      <form name="Ubah" action="../controller/update/datapasien.php" method="post">

        <input name="idpasien" type="hidden">

        <div class="input">
          <input type="text" class="form-input" required placeholder="Nama" name="nama">
        </div>

        <div class="input">
          <input type="text" class="form-input" required placeholder="Tempat Lahir" name="tempatlahir">
        </div>

        <div class="input">
          <input type="date" class="form-input" required placeholder="Tanggal Lahir" name="tanggallahir">
        </div>

        <div class="input">
          <select name="jeniskelamin" class="form-select" required>
            <option value="">Jenis Kelamin</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Laki-Laki">Laki-Laki</option>
          </select>
        </div>

        <div class="input">
          <input type="text" class="form-input" required placeholder="alamat" name="alamat">
        </div>

        <div class="input">
          <input type="number" class="form-input" required placeholder="Telepon" name="telepon">
        </div>

        <div class="input">
          <input type="email" class="form-input" required placeholder="Email" name="email">
        </div>

        <div class="input">
          <input type="password" class="form-input" required placeholder="Password" name="password">
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