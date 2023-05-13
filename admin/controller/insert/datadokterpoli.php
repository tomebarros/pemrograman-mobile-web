<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['idpoli']);
$fariabel2 = input($_POST['idkaryawan']);


mysqli_query($koneksi, "insert into dokterpoli values('','$fariabel1','$fariabel2')");

header("location:../../userinterface/datadokterpoli.php?q=$fariabel1");
