<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['idkaryawan']);
$namaVariabel2 = input($_POST['idruang']);
$namaVariabel3 = input($_POST['hari']);
$namaVariabel4 = input($_POST['jammulai']);
$namaVariabel5 = input($_POST['jamselesai']);
$namaVariabel6 = input($_POST['statusketersediaan']);

$namaVariabel = input($_POST['idjadwalkaryawan']);

// update data ke database
mysqli_query($koneksi, "update jadwalkaryawan set idkaryawan='$namaVariabel1', idruang='$namaVariabel2', hari='$namaVariabel3', jammulai='$namaVariabel4', jamselesai='$namaVariabel5', statusketersediaan='$namaVariabel6' where idjadwalkaryawan='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datajadwalkaryawan.php");
