<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['barcode']);
$namaVariabel2 = input($_POST['namaobat']);
$namaVariabel3 = input($_POST['hargasatuan']);
$namaVariabel4 = input($_POST['satuan']);
$namaVariabel5 = input($_POST['wujud']);
$namaVariabel6 = input($_POST['ketersediaan']);

$namaVariabel = input($_POST['idobat']);

// update data ke database
mysqli_query($koneksi, "update obat set barcode='$namaVariabel1', namaobat='$namaVariabel2', hargasatuan='$namaVariabel3', satuan='$namaVariabel4', wujud='$namaVariabel5', ketersediaan='$namaVariabel6' where idobat='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/dataobat.php");
