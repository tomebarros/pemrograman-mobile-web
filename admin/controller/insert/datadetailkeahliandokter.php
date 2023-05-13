<?php 
include '../../../template/functions.php';

$fariabel1 = input($_POST['idkaryawan']);
$fariabel2 = input($_POST['idkeahliandokter']);

mysqli_query($koneksi,"INSERT INTO detailkeahliandokter VALUES('','$fariabel1','$fariabel2')");
header("location: ../../userinterface/datadetailkeahliandokter.php?q=$fariabel1");

?>