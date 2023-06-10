<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM jadwalkaryawan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// var_dump($jumlahData);
$data = query("SELECT karyawan.idkaryawan,ruang.idruang, jadwalkaryawan.idjadwalkaryawan, karyawan.nama, karyawan.email, ruang.namaruang,jadwalkaryawan.hari,jadwalkaryawan.jammulai,jadwalkaryawan.jamselesai,jadwalkaryawan.statusketersediaan FROM jadwalkaryawan, karyawan, ruang WHERE jadwalkaryawan.idkaryawan = karyawan.idkaryawan AND jadwalkaryawan.idruang = ruang.idruang ORDER BY jadwalkaryawan.idjadwalkaryawan DESC LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = input($_POST['keyword']);
  $query = "SELECT karyawan.idkaryawan,ruang.idruang,karyawan.nama, karyawan.email, ruang.namaruang, jadwalkaryawan.hari, jadwalkaryawan.jammulai, jadwalkaryawan.jamselesai, jadwalkaryawan.statusketersediaan, jadwalkaryawan.idjadwalkaryawan FROM jadwalkaryawan, karyawan, ruang WHERE jadwalkaryawan.idkaryawan = karyawan.idkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND (karyawan.nama LIKE '%$keyword%' OR karyawan.email LIKE '%$keyword%' OR ruang.namaruang LIKE '%$keyword%' OR jadwalkaryawan.hari LIKE '%$keyword%' OR jadwalkaryawan.statusketersediaan LIKE '%$keyword%') ORDER BY jadwalkaryawan.idjadwalkaryawan ASC;
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
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Nama Ruang</th>
        <th>Hari</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <th><?= $no++; ?></th>
          <td><?= nama($d['nama']); ?></td>
          <td><?= email($d['email']); ?></td>
          <td><?= $d['namaruang']; ?></td>
          <td><?= $d['hari']; ?></td>
          <td><?= $d['jammulai']; ?></td>
          <td><?= $d['jamselesai']; ?></td>
          <td><?= $d['statusketersediaan']; ?></td>
          <td>
            <a href="../controller/delete/datajadwalkaryawan.php?q=<?= $d['idjadwalkaryawan']; ?>" onclick="return confirm('Hapus Data!')">Hapus</a>
            <a href="#" class="btn-ubah" id="modalTargetUbah" idkaryawan="<?= $d['idkaryawan'] ?>" idruang="<?= $d['idruang'] ?>" hari="<?= $d['hari'] ?>" jammulai="<?= $d['jammulai'] ?>" jamselesai="<?= $d['jamselesai'] ?>" statusketersediaan="<?= $d['statusketersediaan'] ?>" idjadwalkaryawan="<?= $d['idjadwalkaryawan'] ?>">Ubah</a>
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
      <form name="Ubah" action="../controller/update/datajadwalkaryawan.php" method="POST">

        <input name="idjadwalkaryawan" type="hidden">

        <div class="input">
          <select name="idkaryawan" class="form-select" required>
            <?php
            $idkaryawan = query("SELECT * FROM karyawan");
            foreach ($idkaryawan as $d2) {
              echo "<option selected value='{$d2['idkaryawan']}'>{$d2['nama']}</option>";
            }
            ?>
          </select>
        </div>


        <div class="input">
          <select name="idruang" class="form-select" required>
            <?php
            $idRuang = query("SELECT * FROM ruang");
            foreach ($idRuang as $d2) {
              echo "<option selected value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
            }
            ?>
          </select>
        </div>

        <div class="input">
          <select name="hari" required class="form-select">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
          </select>
        </div>


        <div class="input">
          <input type="time" class="form-input" required placeholder="Jam Mulai" name="jammulai">
        </div>

        <div class="input">
          <input type="time" class="form-input" required placeholder="Jam Selesai" name="jamselesai">
        </div>

        <div class="input-group mb-2">
          <select name="statusketersediaan" required class="form-select">
            <option value="Ada">Ada</option>
            <option value="Tidak Ada">Tidak Ada</option>
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