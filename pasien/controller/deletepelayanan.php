<?php
include '../controller/other/restrict.php';
include '../../template/functions.php';
$namaVariabel = input($_GET['q']);


// menghapus data dari database
mysqli_query($koneksi, "delete from rekammedis where idrekammedis='$namaVariabel' and jenisperawatan is null");

// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/riwayatrekammedis.php");
