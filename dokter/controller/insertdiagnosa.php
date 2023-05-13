<?php
include '../../template/functions.php';



$fariabel1 = input($_POST['idrekammedis']);
$fariabel2 = input($_POST['idpenyakit']);

// var_dump($_POST);


mysqli_query($koneksi, "insert into detailpenyakit values('','$fariabel1','$fariabel2')");

header("location: ../userinterface/diagnosa.php?q=$fariabel1");
