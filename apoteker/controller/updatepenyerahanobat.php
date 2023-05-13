<?php
include '../../template/functions.php';
// var_dump($_POST);die;


// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['idkaryawan']);
$namaVariabel = input($_POST['idrekammedis']);

// update data ke database
mysqli_query($koneksi, "update resep set idkaryawan='$namaVariabel1' where idrekammedis='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/penyerahanobat.php?q=$namaVariabel");
