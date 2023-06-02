<?php
include '../../../template/functions.php';
include '../other/restrict.php';
date_default_timezone_set('Asia/Makassar');


$idpesan = input($_POST['idpesan']);
$tanggal = date("Y-m-d");
$jam = date('H:i:s');
$email = $_SESSION['emailAdmin'];
$pesan = input($_POST['pesan']);


mysqli_query($koneksi, "INSERT INTO detailpesan VALUE('','$idpesan','$tanggal','$jam','$email','$pesan')");

// // mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/isipesan.php?q=$idpesan");
