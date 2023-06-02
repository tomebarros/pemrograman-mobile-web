<?php
include '../../../template/functions.php';

$namaVariabel = input($_GET['q']);


// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM pesan WHERE idpesan='$namaVariabel'");
mysqli_query($koneksi, "DELETE FROM detailpesan WHERE idpesan='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/pesan.php");
