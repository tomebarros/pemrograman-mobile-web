<?php
include '../../../template/functions.php';
// var_dump($_POST);die;


$lokasi = $_POST['lokasi'];
// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['tanggal']);
$namaVariabel2 = input($_POST['idkamar']);
$namaVariabel3 = input($_POST['status']);

$namaVariabel = input($_POST['idcekkebersihankamar']);

// update data ke database
mysqli_query($koneksi, "update cekkebersihankamar set tanggal='$namaVariabel1', idkamar='$namaVariabel2', status='$namaVariabel3' where idcekkebersihankamar='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datacekkebersihan.php?lokasi=$lokasi");
