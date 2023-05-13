<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['nama']);
$fariabel2 = input($_POST['biaya']);
$fariabel3 = input($_POST['idpoli']);


mysqli_query($koneksi, "insert into keahliandokter values('','$fariabel1','$fariabel2', '$fariabel3')");

header("location:../../userinterface/datakeahliandokter.php");
