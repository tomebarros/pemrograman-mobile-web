<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['idkaryawan']);
$fariabel2 = input($_POST['idruang']);
$fariabel3 = input($_POST['hari']);
$fariabel4 = input($_POST['jammulai']);
$fariabel5 = input($_POST['jamselesai']);
$fariabel6 = input($_POST['statusketersediaan']);


mysqli_query($koneksi, "insert into jadwalkaryawan values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6')");

header("location:../../userinterface/datajadwalkaryawan.php");
