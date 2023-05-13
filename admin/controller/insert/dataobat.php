<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['barcode']);
$fariabel2 = input($_POST['namaobat']);
$fariabel3 = input($_POST['hargasatuan']);
$fariabel4 = input($_POST['satuan']);
$fariabel5 = input($_POST['wujud']);
$fariabel6 = input($_POST['ketersediaan']);


mysqli_query($koneksi, "insert into obat values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6')");
header("location:../../userinterface/dataobat.php");
