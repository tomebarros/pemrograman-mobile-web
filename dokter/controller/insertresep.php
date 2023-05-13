<?php
include '../../template/functions.php';

// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['idrekammedis']);
$namaVariabel2 = input($_POST['idobat']);
$namaVariabel3 = input($_POST['dosis']);

$hargasatuan = query("SELECT hargasatuan FROM obat WHERE idobat = '$namaVariabel2'")[0]['hargasatuan'];

$namaVariabel4 = input($hargasatuan);
$namaVariabel5 = input($_POST['jumlah']);

// update data ke database
mysqli_query($koneksi, "INSERT INTO resep(idresep, idrekammedis, idobat, dosis, hargasatuan, jumlah) VALUE('','$namaVariabel1','$namaVariabel2','$namaVariabel3','$namaVariabel4','$namaVariabel5')");
// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/resep.php?q=$namaVariabel1");
