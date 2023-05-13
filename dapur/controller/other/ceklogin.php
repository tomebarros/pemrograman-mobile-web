<?php
session_start();
include "../../../template/functions.php";


$email = input($_POST['email']);
$password = input($_POST['password']);


$result = getData("SELECT * FROM karyawan WHERE email = '$email' AND password = '$password' AND pekerjaan = 'Chef'");

if ($result > 0) {
  $_SESSION['emailChef'] = $email;
  $_SESSION['statusChef'] = 'login';
  header("location:../../userinterface/monitoringgizipasien.php");
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
