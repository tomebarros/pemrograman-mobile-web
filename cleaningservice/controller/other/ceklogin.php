<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Cleaning Service'");

if ($result > 0) {
  $_SESSION['emailCS'] = $email;
  $_SESSION['statusCS'] = 'login';
  header("location:../../userinterface/monitoringkamar.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
