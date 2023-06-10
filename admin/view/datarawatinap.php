<?php

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM rawatinap"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page']) and $_GET['page'] != '') ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT rawatinap.idrawatinap, rekammedis.idrekammedis, pasien.nama AS namapasien ,pasien.tanggallahir,pasien.jeniskelamin,pasien.telepon,karyawan.nama AS namadokter, poli.namapoli,rawatinap.tanggalmulai,rawatinap.tanggalselesai,kamar.idkamar,kamar.nama AS namakamar, kamar.harga,kamar.kelas FROM rawatinap,rekammedis,pasien,karyawan,kamar,poli WHERE rawatinap.idrekammedis = rekammedis.idrekammedis AND rawatinap.idkamar = kamar.idkamar AND rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpoli = poli.idpoli LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = input($_POST['keyword']);
  $query = "SELECT rekammedis.idrekammedis, pasien.nama AS namapasien ,pasien.tanggallahir,pasien.jeniskelamin,pasien.telepon,karyawan.nama AS namadokter, poli.namapoli,rawatinap.tanggalmulai,rawatinap.tanggalselesai,kamar.nama AS namakamar, kamar.harga 
            FROM rawatinap,rekammedis,pasien,karyawan,kamar,poli 
            WHERE rawatinap.idrekammedis = rekammedis.idrekammedis 
            AND rawatinap.idkamar = kamar.idkamar 
            AND rekammedis.idpasien = pasien.idpasien 
            AND rekammedis.idkaryawandokter = karyawan.idkaryawan 
            AND rekammedis.idpoli = poli.idpoli 
            AND (
              pasien.nama LIKE '%$keyword%' OR
              pasien.tanggallahir LIKE '%$keyword%' OR
              pasien.jeniskelamin LIKE '%$keyword%' OR
              karyawan.nama LIKE '%$keyword%' OR
              poli.namapoli LIKE '%$keyword%' OR
              rawatinap.tanggalmulai LIKE '%$keyword%' OR
              rawatinap.tanggalselesai LIKE '%$keyword%' OR
              kamar.nama LIKE '%$keyword%'
              )";
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
  <table class="table  table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>No Rekammedis</small></th>
        <th><small>Nama Pasien</small></th>
        <th><small>Tanggal Lahir</small></th>
        <th><small>Jenis Kelamin</small></th>
        <th><small>Telepon</small></th>
        <th><small>Dokter</small></th>
        <th><small>Poli</small></th>
        <th><small>Tanggal Mulai</small></th>
        <th><small>Tanggal Selsai</small></th>
        <th><small>Kamar</small></th>
        <th><small>Kelas</small></th>
        <th><small>Harga</small></th>
        <th><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = $awalData + 1;
      foreach ($data as $d) {
      ?>
        <tr <?php if (is_null($d['tanggalselesai']) or $d['tanggalselesai'] == '0000-00-00') { ?> class="bg-primary text-light" <?php } ?>>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= $d['idrekammedis']; ?></small></td>
          <td><small><?= nama($d['namapasien']); ?></small></td>
          <td><small><?= tanggal($d['tanggallahir']); ?></small></td>
          <td><small><?= $d['jeniskelamin']; ?></small></td>
          <td><small><?= $d['telepon']; ?></small></td>
          <td><small><?= $d['namadokter']; ?></small></td>
          <td><small><?= $d['namapoli']; ?></small></td>
          <td><small><?= tanggal($d['tanggalmulai']); ?></small></td>
          <td><small><?= tanggal($d['tanggalselesai']); ?></small></td>
          <td><small><?= $d['namakamar']; ?></small></td>
          <td><small><?= $d['kelas']; ?></small></td>
          <td><small><?= rupiah($d['harga']); ?></small></td>
          <td><small>
              <a href="#" <?php if (is_null($d['tanggalselesai']) or $d['tanggalselesai'] == '0000-00-00') { ?> class="text-light" <?php } ?> data-bs-toggle="modal" data-bs-target="#modalubah<?= $d['idrawatinap']; ?>">Ubah</a>
              <a href="../controller/delete/datarawatinap.php?q=<?= $d['idrawatinap']; ?>" <?php if (is_null($d['tanggalselesai']) or $d['tanggalselesai'] == '0000-00-00') { ?> class="text-light" <?php } ?>>Hapus</a>
            </small>
          </td>
        </tr>



        <!-- Modal -->
        <div class="modal fade" id="modalubah<?= $d['idrawatinap']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="../controller/update/datarawatinap.php" method="post">
                  <input type="hidden" name="idrawatinap" value="<?= $d['idrawatinap']; ?>">

                  <div class="input-group mb-2">
                    <span class="input-group-text">Tanggal Selesai</span>
                    <input type="date" name="tanggalselesai" value="<?= $d['tanggalselesai']; ?>" required class="form-control">
                  </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text">Kamar</span>
                    <select name="idkamar" class="form-select" required>
                      <?php
                      $id = $d['idkamar'];
                      $dataKamar = query("SELECT * FROM kamar");
                      foreach ($dataKamar as $d2) {
                        if ($id == $d2['idkamar']) {
                          echo "<option selected value='{$d2['idkamar']}'>{$d2['nama']} | Kelas {$d2['kelas']} | {$d2['harga']}</option>";
                        } else {
                          echo "<option  value='{$d2['idkamar']}'>{$d2['nama']} | Kelas {$d2['kelas']} | {$d2['harga']}</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>




              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </tbody>
  </table>
</div>
<?php include '../../template/navtab.php'; ?>