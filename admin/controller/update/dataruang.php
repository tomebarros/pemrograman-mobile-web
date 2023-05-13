<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['namaruang']);

$namaVariabel = input($_POST['idruang']);

// update data ke database
mysqli_query($koneksi, "update ruang set namaruang='$namaVariabel1' where idruang='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/dataruang.php");
