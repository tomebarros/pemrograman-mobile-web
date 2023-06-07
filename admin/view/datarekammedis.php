<?php

$data = query("SELECT rekammedis.idkaryawandokter,rekammedis.idrekammedis, pasien.idpasien, pasien.nama AS namapasien, pasien.tempatlahir, pasien.tanggallahir, pasien.jeniskelamin, rekammedis.tanggalpelayanan, rekammedis.idjadwalkaryawan, karyawan.nama namapetugas, jadwalkaryawan.idruang, ruang.namaruang, jadwalkaryawan.hari, jadwalkaryawan.jammulai, jadwalkaryawan.jamselesai,jadwalkaryawan.statusketersediaan, rekammedis.idpoli, poli.namapoli, rekammedis.tanggalcheckin,rekammedis.jamcheckin, rekammedis.bb as beratbadan, rekammedis.tb as tinggibadan, rekammedis.suhu,rekammedis.tensi,rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan, rekammedis.lamasakit, rekammedis.statusperawatan,rekammedis.tanggalkontrol, rekammedis.idkaryawankasir, rekammedis.metodepembayaran FROM rekammedis,pasien,karyawan,jadwalkaryawan,ruang,poli WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawan = karyawan.idkaryawan AND rekammedis.idjadwalkaryawan = jadwalkaryawan.idjadwalkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND rekammedis.idpoli = poli.idpoli;");

if (isset($_POST['cari']) and !empty($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
  $query = "SELECT rekammedis.idkaryawandokter,rekammedis.idrekammedis, pasien.idpasien, pasien.nama AS namapasien, pasien.tempatlahir, pasien.tanggallahir, pasien.jeniskelamin, rekammedis.tanggalpelayanan, rekammedis.idjadwalkaryawan, karyawan.nama namapetugas, jadwalkaryawan.idruang, ruang.namaruang, jadwalkaryawan.hari, jadwalkaryawan.jammulai, jadwalkaryawan.jamselesai,jadwalkaryawan.statusketersediaan, rekammedis.idpoli, poli.namapoli, rekammedis.tanggalcheckin,rekammedis.jamcheckin, rekammedis.bb as beratbadan, rekammedis.tb as tinggibadan, rekammedis.suhu,rekammedis.tensi,rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan, rekammedis.lamasakit, rekammedis.statusperawatan,rekammedis.tanggalkontrol, rekammedis.idkaryawankasir, rekammedis.metodepembayaran FROM rekammedis,pasien,karyawan,jadwalkaryawan,ruang,poli WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawan = karyawan.idkaryawan AND rekammedis.idjadwalkaryawan = jadwalkaryawan.idjadwalkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND rekammedis.idpoli = poli.idpoli AND 
  (
    pasien.nama like '%$keyword%'
  )";

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
      <th>Nama Pasien</th>
      <th>NO Medis</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Pelayan</th>
      <th>Dokter</th>
      <th>Perawat Pemeriksa</th>
      <th>Nama Ruang</th>
      <th>Hari</th>
      <th>Jam Mulai</th>
      <th>Jam Selesai</th>
      <th>Status Ketersediaan</th>
      <th>Nama Poli</th>
      <th>Tanggal CheckIn</th>
      <th>Jam CheckIn</th>
      <th>Berat Badan</th>
      <th>Tinggi Badan</th>
      <th>Suhu</th>
      <th>Tensi</th>
      <th>Catatan Hasil Lab</th>
      <th>Catatan Alergi Obat</th>
      <th>Catatan Alergi Makanan</th>
      <th>Jenis Perawatan</th>
      <th>Lama Sakit</th>
      <th>Status Perawatan</th>
      <th>Tanggal Kontrol</th>
      <th>Kasir</th>
      <th>Metode Pembayaran</th>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $d) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $d['namapasien']; ?></td>
          <td><?= $d['idrekammedis']; ?></td>
          <td><?= $d['tempatlahir']; ?></td>
          <td><?= tanggal($d['tanggallahir']); ?></td>
          <td><?= $d['jeniskelamin']; ?></td>
          <td><?= tanggal($d['tanggalpelayanan']); ?></td>
          <td><?= getKaryawanById($d['idkaryawandokter']); ?></td>
          <td><?= $d['namapetugas']; ?></td>
          <td><?= $d['namaruang']; ?></td>
          <td><?= $d['hari']; ?><< /td>
          <td><?= $d['jammulai']; ?></td>
          <td><?= $d['jamselesai']; ?></td>
          <td><?= $d['statusketersediaan']; ?></td>
          <td><?= $d['namapoli']; ?><< /td>
          <td><?= tanggal($d['tanggalcheckin']); ?></td>
          <td><?= $d['jamcheckin']; ?></td>
          <td><?= $d['beratbadan']; ?></td>
          <td><?= $d['tinggibadan']; ?></td>
          <td><?= $d['suhu']; ?></td>
          <td><?= $d['tensi']; ?></td>
          <td><?= $d['catatanhasillab']; ?></td>
          <td><?= $d['catatanalergiobat']; ?></td>
          <td><?= $d['catatanalergimakanan']; ?></td>
          <td><?= ($d['jenisperawatan'] == '0') ? 'Rawat Jalan' : 'Rawat Inap'; ?></td>
          <td><?= $d['lamasakit']; ?></td>
          <td><?= tanggal($d['statusperawatan']); ?></td>
          <td><?= tanggal($d['tanggalkontrol']); ?></td>
          <td><?= getKaryawanById($d['idkaryawankasir']); ?></td>
          <td><?= ($d['metodepembayaran'] == '1') ? 'Tunai' : 'Transfer'; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

<!-- <?php include '../../template/pagination.php'; ?> -->