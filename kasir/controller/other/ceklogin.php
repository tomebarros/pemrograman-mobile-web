<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Kasir'");

if ($result > 0) {
  $_SESSION['emailKasir'] = $email;
  $_SESSION['statusKasir'] = 'login';
  header("location:../../userinterface/monitoringpembayaran.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
