<?php
include '../../template/functions.php';
include '../controller/other/restrict.php';

$idrekammedis = input($_GET['q']);
$dataResep = query("SELECT rekammedis.idrekammedis,obat.namaobat,obat.satuan,obat.wujud, resep.dosis, rekammedis.tanggalpelayanan,rekammedis.statusperawatan, karyawan.nama AS namadokter, pasien.nama AS namapasien FROM rekammedis,resep,obat,karyawan,pasien WHERE rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idpasien = pasien.idpasien AND rekammedis.tanggalpelayanan AND rekammedis.idrekammedis = $idrekammedis;");

$email = $_SESSION['emailApoteker'];
$namaApoteker = query("SELECT nama FROM karyawan WHERE email = '$email'")[0]['nama'];

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
          <td>No Medis</td>
          <td><?= $idrekammedis; ?></td>
          <td>Tgl : <?= tanggal($dataResep[0]['tanggalpelayanan']); ?></td>
        </tr>


        <tr>
          <td>Dokter</td>
          <td><?= $dataResep[0]['namadokter']; ?></td>
          <td>Tgl : <?= tanggal($dataResep[0]['statusperawatan']); ?></td>
        </tr>


        <tr>
          <td>Untuk</td>
          <td colspan="2"><?= $dataResep[0]['namapasien']; ?></td>
        </tr>

      </table>

      <div class="data-resep" style="text-align: center; margin-top: 90px;">

        <?php
        foreach ($dataResep as $d) {
          echo "<li>{$d['namaobat']} | {$d['satuan']} | {$d['wujud']} | {$d['dosis']}</li>";
        }
        ?>
      </div>


      <h4 style="text-align: right; margin-top: 50px;"><?= $namaApoteker; ?></h4>

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