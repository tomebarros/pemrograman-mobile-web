<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['nama']);
$namaVariabel = input($_POST['idpenyakit']);

// update data ke database
mysqli_query($koneksi, "update penyakit set nama='$namaVariabel1' where idpenyakit='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datapenyakit.php");
