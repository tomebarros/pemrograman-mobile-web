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
        <th><small>Tempat Lahir</small></th>
        <th><small>Tanggal Lahir</small></th>
        <th><small>Jenis Kelamin</small></th>
        <th><small>Alamat</small></th>
        <th><small>Telepon</small></th>
        <th><small>Email</small></th>
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
          <td><small><?= $d['tempatlahir']; ?></small></td>
          <td><small><?= tanggal($d['tanggallahir']); ?></small></td>
          <td><small><?= $d['jeniskelamin']; ?></small></td>
          <td><small><?= $d['alamat']; ?></small></td>
          <td><small><?= $d['telepon']; ?></small></td>
          <td><small><?= $d['email']; ?><< /small>/td>
          <td><small>
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $d['idpasien']; ?>">Ubah</a>
              <a href="../controller/delete/datapasien.php?q=<?= $d['idpasien']; ?>">Hapus</a>
            </small>
          </td>
        </tr>



        <!-- Modal -->
        <div class="modal fade" id="modalUbah<?= $d['idpasien']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/datapasien.php" method="post">
                  <input type="hidden" name="idpasien" value="<?= $d['idpasien']; ?>">

                  <div class="input-group mb-2">
                    <span class="input-group-text">Nama</span>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Tempat Lahir</span>
                    <input type="text" name="tempatlahir" class="form-control" value="<?= $d['tempatlahir']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Tanggal Lahir</span>
                    <input type="date" name="tanggallahir" class="form-control" value="<?= $d['tanggallahir']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">jenis Kelamin</span>
                    <select name="jeniskelamin" required class="form-select">
                      <option value="Laki-Laki" <?= $d['jeniskelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                      <option value="Perempuan" <?= $d['jeniskelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Alamat</span>
                    <input type="text" name="alamat" class="form-control" value="<?= $d['alamat']; ?>" required>
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Telepon</span>
                    <input type="number" name="telepon" class="form-control" value="<?= $d['telepon']; ?>" required>
                  </div>


                  <div class="input-group mb-2">
                    <span class="input-group-text">Email</span>
                    <input type="email" name="email" class="form-control" value="<?= $d['email']; ?>" required>
                  </div>
                  <div class="input-group mb-2">
                    <span class="input-group-text">Password</span>
                    <input type="text" name="password" class="form-control" value="<?= $d['password']; ?>" required>
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
<?php include '../../template/navtab.php';  ?>