<?php
include '../../../template/functions.php';
include '../../controller/other/restrict.php';

$namaVariabel = input($_GET['q']);

// menghapus data dari database
mysqli_query($koneksi, "delete from pasien where idpasien='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datapasien.php");
