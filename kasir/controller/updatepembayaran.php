<?php
include '../../template/functions.php';
session_start();


$idkasir = query("SELECT idkaryawan FROM karyawan WHERE email = '{$_SESSION['emailKasir']}'")[0]['idkaryawan'];

// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['metodepembayaran']);

$namaVariabel = input($_POST['idrekammedis']);

// // update data ke database
mysqli_query($koneksi, "update rekammedis set idkaryawankasir='$idkasir', metodepembayaran='$namaVariabel1' where idrekammedis='$namaVariabel'");

// // mengalihkan halaman kembali ke index.php

header("location: ../userinterface/monitoringpembayaran.php");
