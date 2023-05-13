<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['nama']);
$namaVariabel2 = input($_POST['kelas']);
$namaVariabel3 = input($_POST['harga']);

$namaVariabel = input($_POST['idkamar']);

// update data ke database
mysqli_query($koneksi, "update kamar set nama='$namaVariabel1', kelas='$namaVariabel2', harga='$namaVariabel3' where idkamar='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datakamar.php");
