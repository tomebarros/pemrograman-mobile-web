<?php
session_start();
include "../../../template/functions.php";
$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM pasien WHERE email = '$email' AND password = '$password'");

if ($result > 0) {
  $_SESSION['emailPasien'] = $email;
  $_SESSION['statusPasien'] = 'login';
  header("location:../../userinterface/riwayatrekammedis.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
