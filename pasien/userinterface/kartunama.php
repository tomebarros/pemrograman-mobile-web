<?php
include '../../template/functions.php';
include '../controller/other/restrict.php';

$emailPasien = $_SESSION['emailPasien'];
$dataPasien = query("SELECT * FROM pasien WHERE email = '$emailPasien'")[0];

$nama_dokumen = "Kartu Nama-{$dataPasien['nama']}";
include("../../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
//$mpdf=new mPDF("en-GB-x","Letter-L","","",10,10,10,10,6,3); // Kertas landscape (mendatar)
$mpdf->SetHeader('');
//$mpdf->setFooter('{PAGENO}');// Memberi nomor halaman
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Nama <?= $dataPasien['nama']; ?></title>
  <style>
    div {
      background-image: url('../../img/bg-idcard.png');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      width: 80%;
      position: relative;
    }

    table tr td p {
      color: #fff !important;
    }
  </style>
</head>

<body>
  <div>
    <table border="0" cellpadding="5" cellspacing="0" width="100%">
      <tr>
        <td width="20%">
          <center>
            <img width="6rem" src="../../img/logo.png" alt="">
          </center>
        </td>
        <td style="color: #fff;">
          <center>
            <h3>TomeHealth</h3>
            <p>JL. Perintis Kemerdekaan II, Telp. 0821-9999-9999</p>
            <p>Email : cs@21120055rekammedis.my.id</p>
          </center>
        </td>
      </tr>
    </table>

    <table border="0" cellpadding="20" cellspacing="0" width="100%">

      <tr>
        <td width="50%" style="color: #fff;">
          <p>Nama</p>
          <p>Tempat Lahir</p>
          <p>Tanggal Lahir</p>
          <p>Jenis Kelamin</p>
          <p>Alamat</p>
          <p>No Hp</p>
          <p>Email</p>
        </td>
        <td width="50%" style="color: #fff;">
          <p>: <?= $dataPasien["nama"]; ?></p>
          <p>: <?= $dataPasien["tempatlahir"]; ?></p>
          <p>: <?= tanggal($dataPasien["tanggallahir"]); ?></p>
          <p>: <?= $dataPasien["jeniskelamin"]; ?></p>
          <p>: <?= $dataPasien["alamat"]; ?></p>
          <p>: <?= $dataPasien["telepon"]; ?></p>
          <p>: <?= $dataPasien["email"]; ?></p>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>





<?php
//Membuat laporan pdf bagian atas
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>