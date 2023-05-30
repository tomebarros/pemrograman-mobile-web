<?php
include '../../template/functions.php';


session_start();
$eperawat = $_SESSION['emailPerawatPemeriksa'];
$idperawat = query("SELECT idkaryawan FROM karyawan WHERE email = '$eperawat'")[0]['idkaryawan'];

// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['tanggalcheckin']);
$namaVariabel2 = input($_POST['jamcheckin']);
$namaVariabel3 = input($_POST['tb']);
$namaVariabel4 = input($_POST['bb']);
$namaVariabel5 = input($_POST['suhu']);
$namaVariabel6 = input($_POST['tensi']);
$namaVariabel7 = input($_POST['catatanhasillab']);
$namaVariabel8 = input($_POST['catatanalergimakanan']);
$namaVariabel9 = input($_POST['catatanalergiobat']);
$namaVariabel10 = input($idperawat);
$namaVariabel = input($_POST['idrekammedis']);



// update data ke database
mysqli_query($koneksi, "update rekammedis set tanggalcheckin='$namaVariabel1', jamcheckin='$namaVariabel2', tb='$namaVariabel3', bb='$namaVariabel4', suhu='$namaVariabel5', tensi='$namaVariabel6',  catatanhasillab='$namaVariabel7', catatanalergimakanan='$namaVariabel8', catatanalergiobat='$namaVariabel9', idkaryawan='$namaVariabel10', checkin='0' where idrekammedis='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/pemeriksaanawal.php?q=$namaVariabel");
