<?php
include '../../template/functions.php';

$idrekammedis = input($_GET['idrekammedis']);
$idresep = input($_GET['idresep']);


// menghapus data dari database
mysqli_query($koneksi, "delete from resep where idresep='$idresep'");

// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/resep.php?q=$idrekammedis");
