<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['tanggal']);
$fariabel2 = input($_POST['idruang']);
$fariabel3 = input($_POST['status']);
$fariabel4 = input($_POST['idkaryawan']);


mysqli_query($koneksi, "insert into cekkebersihanruang values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4')");

header("location:../../userinterface/datacekkebersihan.php");
