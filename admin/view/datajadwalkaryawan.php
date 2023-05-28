<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM jadwalkaryawan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// var_dump($jumlahData);
$data = query("SELECT karyawan.idkaryawan,ruang.idruang, jadwalkaryawan.idjadwalkaryawan, karyawan.nama, karyawan.email, ruang.namaruang,jadwalkaryawan.hari,jadwalkaryawan.jammulai,jadwalkaryawan.jamselesai,jadwalkaryawan.statusketersediaan FROM jadwalkaryawan, karyawan, ruang WHERE jadwalkaryawan.idkaryawan = karyawan.idkaryawan AND jadwalkaryawan.idruang = ruang.idruang ORDER BY jadwalkaryawan.idjadwalkaryawan DESC LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
  $query = "SELECT karyawan.idkaryawan,ruang.idruang,karyawan.nama, karyawan.email, ruang.namaruang, jadwalkaryawan.hari, jadwalkaryawan.jammulai, jadwalkaryawan.jamselesai, jadwalkaryawan.statusketersediaan, jadwalkaryawan.idjadwalkaryawan FROM jadwalkaryawan, karyawan, ruang WHERE jadwalkaryawan.idkaryawan = karyawan.idkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND (karyawan.nama LIKE '%$keyword%' OR karyawan.email LIKE '%$keyword%' OR ruang.namaruang LIKE '%$keyword%' OR jadwalkaryawan.hari LIKE '%$keyword%' OR jadwalkaryawan.statusketersediaan LIKE '%$keyword%') ORDER BY jadwalkaryawan.idjadwalkaryawan ASC;
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
        <th><small>No</th>
        <th><small>Nama</th>
        <th><small>Email</th>
        <th><small>Nama Ruang</th>
        <th><small>Hari</th>
        <th><small>Jam Mulai</th>
        <th><small>Jam Selesai</th>
        <th><small>Status</th>
        <th><small>Aksi</th>
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
          <td><small><?= email($d['email']); ?></small></td>
          <td><small><?= $d['namaruang']; ?></small></td>
          <td><small><?= $d['hari']; ?></small></td>
          <td><small><?= $d['jammulai']; ?></small></td>
          <td><small><?= $d['jamselesai']; ?></small></td>
          <td><small><?= $d['statusketersediaan']; ?></small></td>
          <td>
            <small>
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idjadwalkaryawan']; ?>">Ubah</a>
              <a href="../controller/delete/datajadwalkaryawan.php?q=<?= $d['idjadwalkaryawan']; ?>">Hapus</a>
            </small>
          </td>
        </tr>


        <!-- Modal -->
        <div class="modal fade" id="modalUbah<?= $d['idjadwalkaryawan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/datajadwalkaryawan.php" method="post">
                  <input type="hidden" name="idjadwalkaryawan" value="<?= $d['idjadwalkaryawan']; ?>">


                  <div class="input-group mb-2">
                    <span class="input-group-text">Karyawan</span>
                    <select name="idkaryawan" class="form-select" required>
                      <?php
                      $id = $d['idkaryawan'];
                      $idkaryawan = query("SELECT * FROM karyawan");
                      foreach ($idkaryawan as $d2) {
                        if ($d2['idkaryawan'] == $id) {
                          echo "<option selected value='{$d2['idkaryawan']}'>{$d2['nama']}</option>";
                        } else {
                          echo "<option value='{$d2['idkaryawan']}'>{$d2['nama']}</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Ruang</span>
                    <select name="idruang" class="form-select" required>
                      <?php
                      $id = $d['idruang'];
                      $idRuang = query("SELECT * FROM ruang");
                      foreach ($idRuang as $d2) {
                        if ($d2['idruang'] == $id) {
                          echo "<option selected value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
                        } else {
                          echo "<option value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>


                  <div class="input-group mb-2">
                    <span class="input-group-text">Hari</span>
                    <select name="hari" required class="form-select">
                      <option value="Senin" <?= $d['hari'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                      <option value="Selasa" <?= $d['hari'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                      <option value="Rabu" <?= $d['hari'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                      <option value="Kamis" <?= $d['hari'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                      <option value="Jumat" <?= $d['hari'] == 'Jumat' ? 'selected' : '' ?>>Jumat</option>
                      <option value="Sabtu" <?= $d['hari'] == 'Sabtu' ? 'selected' : '' ?>>Sabtu</option>
                      <option value="Minggu" <?= $d['hari'] == 'Minggu' ? 'selected' : '' ?>>Minggu</option>
                    </select>
                  </div>


                  <div class="input-group mb-2">
                    <span class="input-group-text">Jam Mulai</span>
                    <input type="time" name="jammulai" class="form-control" value="<?= $d['jammulai']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Jam Selesai</span>
                    <input type="time" name="jamselesai" class="form-control" value="<?= $d['jamselesai']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Status Kehadiran</span>
                    <select name="statusketersediaan" required class="form-select">
                      <option value="Hadir" <?= $d['statusketersediaan'] == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                      <option value="Tidak Hadir" <?= $d['statusketersediaan'] == 'Tidak Hadir' ? 'selected' : '' ?>>Tidak Hadir</option>
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