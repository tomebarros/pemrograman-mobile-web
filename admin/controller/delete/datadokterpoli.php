<?php
include '../../../template/functions.php';

$namaVariabel1 = input($_GET['iddokterpoli']);
$namaVariabel = input($_GET['q']);


// menghapus data dari database
mysqli_query($koneksi, "delete from dokterpoli where iddokterpoli='$namaVariabel1'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datadokterpoli.php?q=$namaVariabel");
