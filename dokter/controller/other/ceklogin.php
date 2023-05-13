<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Dokter'");

if ($result > 0) {
  $_SESSION['emailDokter'] = $email;
  $_SESSION['statusDokter'] = 'login';
  header("location:../../userinterface/monitoringpemeriksaan.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
