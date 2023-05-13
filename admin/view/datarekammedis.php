<input class="form-control" id="myInput" type="search" placeholder="Cari..">
<br>
<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Nama Pasien</small></th>
        <th><small>NO Medis</small></th>
        <th><small>Tempat Lahir</small></th>
        <th><small>Tanggal Lahir</small></th>
        <th><small>Jenis Kelamin</small></th>
        <th><small>Tanggal Pelayan</small></th>
        <th><small>Dokter</small></th>
        <th><small>Perawat Pemeriksa</small></th>
        <th><small>Nama Ruang</small></th>
        <th><small>Hari</small></th>
        <th><small>Jam Mulai</small></th>
        <th><small>Jam Selesai</small></th>
        <th><small>Status Ketersediaan</small></th>
        <th><small>Nama Poli</small></th>
        <th><small>Tanggal CheckIn</small></th>
        <th><small>Jam CheckIn</small></th>
        <th><small>Berat Badan</small></th>
        <th><small>Tinggi Badan</small></th>
        <th><small>Suhu</small></th>
        <th><small>Tensi</small></th>
        <th><small>Catatan Hasil Lab</small></th>
        <th><small>Catatan Alergi Obat</small></th>
        <th><small>Catatan Alergi Makanan</small></th>
        <th><small>Jenis Perawatan</small></th>
        <th><small>Lama Sakit</small></th>
        <th><small>Status Perawatan</small></th>
        <th><small>Tanggal Kontrol</small></th>
        <th><small>Kasir</small></th>
        <th><small>Metode Pembayaran</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = query("SELECT rekammedis.idkaryawandokter,rekammedis.idrekammedis, pasien.idpasien, pasien.nama AS namapasien, pasien.tempatlahir, pasien.tanggallahir, pasien.jeniskelamin, rekammedis.tanggalpelayanan, rekammedis.idjadwalkaryawan, karyawan.nama namapetugas, jadwalkaryawan.idruang, ruang.namaruang, jadwalkaryawan.hari, jadwalkaryawan.jammulai, jadwalkaryawan.jamselesai,jadwalkaryawan.statusketersediaan, rekammedis.idpoli, poli.namapoli, rekammedis.tanggalcheckin,rekammedis.jamcheckin, rekammedis.bb as beratbadan, rekammedis.tb as tinggibadan, rekammedis.suhu,rekammedis.tensi,rekammedis.catatanhasillab,rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan,rekammedis.jenisperawatan, rekammedis.lamasakit, rekammedis.statusperawatan,rekammedis.tanggalkontrol, rekammedis.idkaryawankasir, rekammedis.metodepembayaran FROM rekammedis,pasien,karyawan,jadwalkaryawan,ruang,poli WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawan = karyawan.idkaryawan AND rekammedis.idjadwalkaryawan = jadwalkaryawan.idjadwalkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND rekammedis.idpoli = poli.idpoli;");
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= $d['namapasien']; ?></small></td>
          <td><small><?= $d['idrekammedis']; ?></small></td>
          <td><small><?= $d['tempatlahir']; ?></small></td>
          <td><small><?= tanggal($d['tanggallahir']); ?></small></td>
          <td><small><?= $d['jeniskelamin']; ?></small></td>
          <td><small><?= tanggal($d['tanggalpelayanan']); ?></small></td>
          <td><small><?= getKaryawanById($d['idkaryawandokter']); ?></small></td>
          <td><small><?= $d['namapetugas']; ?></small></td>
          <td><small><?= $d['namaruang']; ?></small></td>
          <td><small><?= $d['hari']; ?></small></td>
          <td><small><?= $d['jammulai']; ?></small></td>
          <td><small><?= $d['jamselesai']; ?></small></td>
          <td><small><?= $d['statusketersediaan']; ?></small></td>
          <td><small><?= $d['namapoli']; ?></small></td>
          <td><small><?= tanggal($d['tanggalcheckin']); ?></small></td>
          <td><small><?= $d['jamcheckin']; ?></small></td>
          <td><small><?= $d['beratbadan']; ?></small></td>
          <td><small><?= $d['tinggibadan']; ?></small></td>
          <td><small><?= $d['suhu']; ?></small></td>
          <td><small><?= $d['tensi']; ?></small></td>
          <td><small><?= $d['catatanhasillab']; ?></small></td>
          <td><small><?= $d['catatanalergiobat']; ?></small></td>
          <td><small><?= $d['catatanalergimakanan']; ?></small></td>
          <td><small><?= ($d['jenisperawatan'] == '0') ? 'Rawat Jalan' : 'Rawat Inap'; ?></small></td>
          <td><small><?= $d['lamasakit']; ?></small></td>
          <td><small><?= tanggal($d['statusperawatan']); ?></small></td>
          <td><small><?= tanggal($d['tanggalkontrol']); ?></small></td>
          <td><small><?= getKaryawanById($d['idkaryawankasir']); ?></small></td>
          <td><small><?= ($d['metodepembayaran'] == '1') ? 'Tunai' : 'Transfer'; ?></small></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>