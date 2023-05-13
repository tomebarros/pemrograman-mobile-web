<?php
include '../../template/functions.php';

$idrekammedis = input($_GET['idrekammedis']);
$iddetailpenyakit = input($_GET['iddetailpenyakit']);


// menghapus data dari database
mysqli_query($koneksi, "delete from detailpenyakit where iddetailpenyakit='$iddetailpenyakit'");

// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/diagnosa.php?q=$idrekammedis");
