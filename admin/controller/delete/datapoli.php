<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$namaVariabel = input($_GET['q']);


// menghapus data dari database
mysqli_query($koneksi, "delete from poli where idpoli='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datapoli.php");
