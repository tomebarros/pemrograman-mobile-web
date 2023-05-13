<?php
include '../../../template/functions.php';



// menangkap data yang di kirim dari form
$namaVariabel1 = input($_POST['namapoli']);
$namaVariabel = input($_POST['idpoli']);

// update data ke database
mysqli_query($koneksi, "update poli set namapoli='$namaVariabel1' where idpoli='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location: ../../userinterface/datapoli.php");
