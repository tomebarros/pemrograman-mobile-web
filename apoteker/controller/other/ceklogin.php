<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Apoteker'");

if ($result > 0) {
  $_SESSION['emailApoteker'] = $email;
  $_SESSION['statusApoteker'] = 'login';
  header("location:../../userinterface/monitoringresep.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
