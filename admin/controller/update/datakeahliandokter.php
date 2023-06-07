<?php
include '../../../template/functions.php';
include '../other/restrict.php';
// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['nama']);
$namaVariabel2 = input($_POST['biaya']);
$namaVariabel3 = input($_POST['idpoli']);

$namaVariabel = input($_POST['idkeahliandokter']);

// update data ke database
mysqli_query($koneksi, "update keahliandokter set nama='$namaVariabel1', biaya='$namaVariabel2', idpoli='$namaVariabel3' where idkeahliandokter='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datakeahliandokter.php");
