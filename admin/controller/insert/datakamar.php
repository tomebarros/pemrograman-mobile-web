<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['nama']);
$fariabel2 = input($_POST['kelas']);
$fariabel3 = input($_POST['harga']);


mysqli_query($koneksi, "insert into kamar values('','$fariabel1','$fariabel2','$fariabel3')");
header("location:../../userinterface/datakamar.php");
