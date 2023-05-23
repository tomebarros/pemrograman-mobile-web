<?php
include '../../template/functions.php';

$idrekammedis = input($_GET['q']);

$dataMedis = query("SELECT rekammedis.idrekammedis, pasien.nama AS namapasien, pasien.tempatlahir, pasien.tanggallahir, pasien.jeniskelamin, pasien.alamat, pasien.telepon, pasien.email, rekammedis.tanggalpelayanan, ruang.namaruang, poli.namapoli, karyawan.nama AS namadokter, rekammedis.keluhanawal, rekammedis.idkaryawan, rekammedis.tanggalcheckin, rekammedis.jamcheckin, rekammedis.tb AS tinggibadan, rekammedis.bb AS beratbadan, rekammedis.suhu, rekammedis.tensi, rekammedis.catatanhasillab, rekammedis.catatanalergiobat,rekammedis.catatanalergimakanan, CASE rekammedis.jenisperawatan WHEN '0' THEN 'Rawat Jalan' WHEN '1' THEN 'Rawat Inap' END AS jenisperawatan, rekammedis.lamasakit, rekammedis.statusperawatan, rekammedis.tanggalkontrol,rekammedis.idkaryawankasir, CASE rekammedis.metodepembayaran WHEN '1' THEN 'Tunai' WHEN '2' THEN 'Transfer' END AS metodepembayaran FROM rekammedis, pasien, jadwalkaryawan,ruang, poli, karyawan WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idjadwalkaryawan = jadwalkaryawan.idjadwalkaryawan AND rekammedis.idpoli = poli.idpoli AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND jadwalkaryawan.idruang = ruang.idruang AND rekammedis.idrekammedis =  $idrekammedis;")[0];

$dataObat = query("SELECT rekammedis.idrekammedis,obat.namaobat,obat.satuan,obat.wujud, resep.dosis, resep.hargasatuan, resep.jumlah, resep.idkaryawan AS idapoteker FROM rekammedis,resep,obat,karyawan,pasien WHERE rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpasien = pasien.idpasien AND rekammedis.tanggalpelayanan AND rekammedis.idrekammedis = $idrekammedis;");

$nama_berkas = "DataMedis-NO" . $idrekammedis;
include("../../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetHeader('');
$mpdf->SetMargins(0, 0, 2, 0); // Mengatur margin menjadi 0
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RekamMedis</title>
  <style>
    h3 {
      font-size: 1.5rem;
      text-align: center;
      text-decoration: underline;
      margin: 0;
    }

    table tr th {
      text-align: left;
    }
  </style>
</head>

<body>

  <?php
  var_dump($dataObat[0]['idapoteker'])
  ?>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="10%">
        <center>
          <img width="9rem" src="../../template/img/logo.png" alt="">
        </center>
      </td>
      <td>
        <center>
          <h1>TomeHealth</h1>
          <p>JL. Perintis Kemerdekaan II, Telp. 0821-9999-9999</p>
          <p>Email : admin@21120055rekammedis.my.id</p>
        </center>
      </td>
    </tr>
  </table>
  <hr>

  <h3>Data Pasien</h3>
  <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <tr>
      <th>Nama</th>
      <td>: <?= $dataMedis['namapasien']; ?></td>
      <th>Alamat</th>
      <td>: <?= $dataMedis['alamat']; ?></td>
    </tr>`
    <tr>
      <th>Tempat Lahir</th>
      <td>: <?= $dataMedis['tempatlahir']; ?></td>
      <th>Tanggal Lahir</th>
      <td>: <?= tanggal($dataMedis['tanggallahir']); ?></td>
    </tr>
    <tr>
      <th>Telepon</th>
      <td>: <?= $dataMedis['telepon']; ?></td>
      <th>Email</th>
      <td>: <?= $dataMedis['email']; ?></td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>: <?= $dataMedis['jeniskelamin']; ?></td>
    </tr>
  </table>

  <h3>Rekam Medis</h3>
  <table border="0" width="100%" cellpadding="3">
    <tr>
      <th>Tanggal Pelayanan</th>
      <td>: <?= tanggal($dataMedis['tanggalpelayanan']); ?></td>
      <th>Tensi</th>
      <td>: <?= $dataMedis['tensi']; ?></td>
    </tr>
    <tr>
      <th>Nama Ruang</th>
      <td>: <?= $dataMedis['namaruang']; ?></td>
      <th>Hasil Lab</th>
      <td>: <?= $dataMedis['catatanhasillab']; ?></td>
    </tr>
    <tr>
      <th>Nama Poli</th>
      <td>: <?= $dataMedis['namapoli']; ?></td>
      <th>Alergi Obat</th>
      <td>: <?= $dataMedis['catatanalergiobat']; ?></td>
    </tr>
    <tr>
      <th>Dokter</th>
      <td>: <?= $dataMedis['namadokter']; ?></td>
      <th>Alergi Makanan</th>
      <td>: <?= $dataMedis['catatanalergimakanan']; ?></td>
    </tr>
    <tr>
      <th>Keluhan Awal</th>
      <td>: <?= $dataMedis['keluhanawal']; ?></td>
      <th>Jenis Perawatan</th>
      <td>: <?= $dataMedis['jenisperawatan']; ?></td>
    </tr>
    <tr>
      <th>Perawat Pemeriksa</th>
      <td>: <?= getKaryawanById($dataMedis['idkaryawan']); ?></td>
      <th>Lama Sakit</th>
      <td>: <?= $dataMedis['lamasakit']; ?></td>
    </tr>
    <tr>
      <th>Tanggal CheckIn</th>
      <td>: <?= tanggal($dataMedis['tanggalcheckin']); ?></td>
      <th>Selesai Perawatan</th>
      <td>: <?= tanggal($dataMedis['statusperawatan']); ?></td>
    </tr>
    <tr>
      <th>Jam CheckIn</th>
      <td>: <?= $dataMedis['jamcheckin']; ?></td>
      <th>Tgl Surat Kontrol</th>
      <td>: <?= tanggal($dataMedis['tanggalkontrol']); ?></td>
    </tr>
    <tr>
      <th>Tinggi Badan</td>
      <td>: <?= $dataMedis['tinggibadan']; ?></td>
      <th>Kasir</th>
      <td>: <?= getKaryawanById($dataMedis['idkaryawankasir']); ?></td>
    </tr>
    <tr>
      <th>Berat Badan</th>
      <td>: <?= $dataMedis['beratbadan']; ?></td>
      <th>Metode Pembawaran</th>
      <td>: <?= $dataMedis['metodepembayaran']; ?></td>
    </tr>
    <tr>
      <th>Suhu</th>
      <td>: <?= $dataMedis['suhu']; ?></td>
      <th>Apoteker</th>
      <td>: <?= getKaryawanById($dataObat[0]['idapoteker']); ?></td>
    </tr>

  </table>



</body>

</html>


<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_berkas . ".pdf", 'I');
exit;
?>