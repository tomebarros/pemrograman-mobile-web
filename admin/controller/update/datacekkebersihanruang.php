<?php
include '../../../template/functions.php';


// var_dump($_POST);die;

$lokasi = $_POST['lokasi'];

// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['tanggal']);
$namaVariabel2 = input($_POST['idruang']);
$namaVariabel3 = input($_POST['status']);

$namaVariabel = input($_POST['idcekkebersihanruang']);

// update data ke database
mysqli_query($koneksi, "update cekkebersihanruang set tanggal='$namaVariabel1', idruang='$namaVariabel2', status='$namaVariabel3' where idcekkebersihanruang='$namaVariabel'");

// mengalihkan halaman kembali ke index.php

header("location: ../../userinterface/datacekkebersihan.php?lokasi=$lokasi");
