
<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['idrekammedis']);
$fariabel2 = input($_POST['tanggalmulai']);
$fariabel3 = input($_POST['tanggalselesai']);
$fariabel4 = input($_POST['idkaryawan']);
$fariabel5 = input($_POST['idkamar']);


mysqli_query($koneksi, "insert into rawatinap values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5')");

header("location:../../userinterface/datarawatinap.php");
