<?php
include '../../../template/functions.php';



$fariabel1 = input($_POST['namapoli']);


mysqli_query($koneksi, "insert into poli values('','$fariabel1')");

header("location:../../userinterface/datapoli.php");
