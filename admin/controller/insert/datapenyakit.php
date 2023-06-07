<?php
include '../../../template/functions.php';
include '../other/restrict.php';
$fariabel1 = input($_POST['nama']);


mysqli_query($koneksi, "insert into penyakit values('','$fariabel1')");

header("location:../../userinterface/datapenyakit.php");
