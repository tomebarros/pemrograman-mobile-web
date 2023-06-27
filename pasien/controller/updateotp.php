<?php
session_start();
if (is_null($_COOKIE['emailOTP'])) {
  header("location: ../userinterface/index.php");
  die;
}

include '../../template/functions.php';

$emailOTP = input($_COOKIE['emailOTP']);
$email = input($_POST['email']);
$otp = input($_POST['otp']);

$row = query("SELECT otp FROM pasien WHERE email = '$email'")[0];

if (password_verify($otp, $row['otp'])) {
  mysqli_query($koneksi, "UPDATE pasien SET otp = '1' WHERE email = '$email'");
  $_SESSION['emailPasien'] = $email;
  $_SESSION['statusPasien'] = 'login';
  setcookie("emailOTP", "", time() - 3600, "/");
  header("location: ../userinterface/riwayatrekammedis.php");
  die;
} else {
  echo "<script>
  alert('Kode Yang Anda Masukan Salah');
  history.go(-1);
  </script>";
  die;
}
