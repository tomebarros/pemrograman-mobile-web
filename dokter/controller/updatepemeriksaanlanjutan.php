<?php
include '../../template/functions.php';

// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['jenisperawatan']);
$namaVariabel2 = input($_POST['lamasakit']);
$namaVariabel3 = input($_POST['statusperawatan']);
$namaVariabel4 = input($_POST['tanggalkontrol']);

$namaVariabel = input($_POST['idrekammedis']);

// update data ke database
mysqli_query($koneksi, "update rekammedis set jenisperawatan='$namaVariabel1', lamasakit='$namaVariabel2', statusperawatan='$namaVariabel3', tanggalkontrol='$namaVariabel4' where idrekammedis='$namaVariabel'");
// mengalihkan halaman kembali ke index.php
header("location: ../userinterface/pemeriksaanlanjutan.php?q=$namaVariabel");
