<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Perawat Pendaftaran'");

if ($result > 0) {
  $_SESSION['emailPerawatPendaftaran'] = $email;
  $_SESSION['statusPerawatPendaftaran'] = 'login';
  header("location:../../userinterface/monitoringrawatinap.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
