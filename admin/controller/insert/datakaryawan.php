<?php 
include '../../../template/functions.php';



$fariabel1 = input($_POST['nama']);
$fariabel2 = input($_POST['tempatlahir']);
$fariabel3 = input($_POST['tanggallahir']);
$fariabel4 = input($_POST['jeniskelamin']);
$fariabel5 = input($_POST['alamat']);
$fariabel6 = input($_POST['telepon']);
$fariabel7 = input($_POST['pekerjaan']);
$fariabel8 = input($_POST['email']);
$fariabel9 = input($_POST['password']);


mysqli_query($koneksi,"insert into karyawan values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6','$fariabel7','$fariabel8','$fariabel9')");

header("location:../../userinterface/datakaryawan.php");
