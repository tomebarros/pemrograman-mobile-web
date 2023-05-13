<?php
include '../../../template/functions.php';


$fariabel1 = input($_POST['idkaryawan']);
$fariabel2 = input($_POST['idrawatinap']);


mysqli_query($koneksi, "insert into detailperawatjaga values('','$fariabel1','$fariabel2')");

header("location:../../userinterface/datadetailperawatjaga.php");
