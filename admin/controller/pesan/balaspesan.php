<?php
include '../../../template/functions.php';

var_dump($_POST);

$idpesan = input($_POST['idpesan']);
$pesan = input($_POST['pesan']);

mysqli_query($koneksi, "UPDATE pesan SET keterangan = '1', balasan = '$pesan' WHERE idpesan = '$idpesan'");

// // mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/isipesan.php?q=$idpesan");
