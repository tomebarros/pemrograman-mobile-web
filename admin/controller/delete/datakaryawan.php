<?php
include '../../../template/functions.php';

$namaVariabel = input($_GET['q']);
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from karyawan where idkaryawan='$namaVariabel'");
 
// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datakaryawan.php");
