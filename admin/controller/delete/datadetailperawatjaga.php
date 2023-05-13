<?php
include '../../../template/functions.php';

$namaVariabel = input($_GET['q']);


// menghapus data dari database
mysqli_query($koneksi, "delete from detailperawatjaga where iddetailperawatjaga='$namaVariabel'");

// mengalihkan halaman kembali ke index.php
header("location:../../userinterface/datadetailperawatjaga.php");
