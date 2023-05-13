<?php
session_start();
include "../../../template/functions.php";
$email = input($_POST['email']);
$password = input($_POST['password']);



$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Admin'");

if ($result > 0) {
  $_SESSION['emailAdmin'] = $email;
  $_SESSION['statusAdmin'] = 'login';
  header("location:../../userinterface/datakaryawan.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
