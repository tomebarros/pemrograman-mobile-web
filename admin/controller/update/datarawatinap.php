<?php
include '../../../template/functions.php';

// var_dump($_POST);die;
// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['tanggalselesai']);
$namaVariabel2 = input($_POST['idkamar']);

$namaVariabel = input($_POST['idrawatinap']);

// update data ke database
mysqli_query($koneksi, "update rawatinap set tanggalselesai='$namaVariabel1', idkamar='$namaVariabel2' where idrawatinap='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datarawatinap.php");
