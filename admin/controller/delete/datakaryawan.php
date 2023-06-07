<?php
include '../../../template/functions.php';
include '../../controller/other/restrict.php';
$namaVariabel = input($_GET['q']);

// menghapus data dari database
mysqli_query($koneksi, "DELETE FROM karyawan WHERE idkaryawan='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datakaryawan.php");
