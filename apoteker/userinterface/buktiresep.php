<?php
include '../../template/functions.php';
include '../controller/other/restrict.php';

// $idrekammedis = input($_GET['q']);
// $dataResep = query("SELECT pasien.nama,pasien.idpasien,rekammedis.idrekammedis, resep.jumlah, obat.namaobat, resep.hargasatuan, resep.hargasatuan * resep.jumlah AS total FROM pasien,rekammedis,resep,obat WHERE rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis = $idrekammedis");
// $namaPasien = $dataResep[0]['nama'];

// $emailKasir = $_SESSION['emailKasir'];
// $namaKasir = query("SELECT nama FROM karyawan WHERE email = '$emailKasir'")[0]['nama'];


// $nama_berkas = "BuktiResep-"  .  $namaPasien . "_" . tanggal(date('Y-m-d'));
$nama_berkas = "BuktiResep-";
include("../../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetHeader('');
// $mpdf->SetMargins(0, 0, 10, 0); // Mengatur margin menjadi 0
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Medis</title>
  <style>
    .resep .resep-header table,
    .resep .resep-body {
      border: 2px solid #010101;
      padding: 0.5rem;
    }
  </style>
</head>

<body>

  <div class="resep">
    <div class="resep-header">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td width="30%">
            <center>
              <img width="9rem" src="../../template/img/logo.png" alt="">
            </center>
          </td>
          <td>
            <h2>Apoteker</h2>
            <h1>TomeHealth</h1>
            <p>JL. Perintis Kemerdekaan II</p>
            <p>Telp. 0821-9999-9999</p>
          </td>
        </tr>
      </table>
    </div>
    <div class="resep-body">
      <h3 style="margin-bottom: 10px; text-align:center; text-decoration:underline;"> Salinan Resep</h3>
      <table border="0" cellpadding="5" cellspacing="0" width="100%">
        <tr>
          <td>No</td>
          <td>No medis</td>
          <td>Tgl : 11-11-1111</td>
        </tr>


        <tr>
          <td>Dokter</td>
          <td>Sayyid</td>
          <td>Tgl : 11-11-1111</td>
        </tr>


        <tr>
          <td>Untuk: </td>
          <td colspan="2">Tome Ornai Barros</td>
        </tr>

      </table>

      <p>paracetamol</p>
      <!-- SELECT rekammedis.idrekammedis,obat.namaobat,obat.satuan,obat.wujud, resep.dosis FROM rekammedis,resep,obat WHERE rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat; -->

    </div>
  </div>


</body>

</html>


<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_berkas . ".pdf", 'I');
exit;
?>