<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['nama']);
$namaVariabel2 = input($_POST['tempatlahir']);
$namaVariabel3 = input($_POST['tanggallahir']);
$namaVariabel4 = input($_POST['jeniskelamin']);
$namaVariabel5 = input($_POST['alamat']);
$namaVariabel6 = input($_POST['telepon']);
$namaVariabel7 = input($_POST['email']);
$namaVariabel8 = input($_POST['password']);

$namaVariabel = input($_POST['idpasien']);

// update data ke database
mysqli_query($koneksi, "update pasien set nama='$namaVariabel1', tempatlahir='$namaVariabel2', tanggallahir='$namaVariabel3', jeniskelamin='$namaVariabel4', alamat='$namaVariabel5', telepon='$namaVariabel6',  email='$namaVariabel7', password='$namaVariabel8' where idpasien='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datapasien.php");
