<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['namaruang']);


mysqli_query($koneksi, "insert into ruang values('','$fariabel1')");

header("location:../../userinterface/dataruang.php");
