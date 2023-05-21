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

<h1>hello</h1>


<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_berkas . ".pdf", 'I');
exit;
?>