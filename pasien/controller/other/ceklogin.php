<?php
session_start();
include "../../../template/functions.php";

$email = input($_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$result = getData("SELECT * FROM pasien WHERE email = '$email'");

if ($result > 0) {
  // cek OTP yg belum verifikasi
  $cekOTP = getData("SELECT * FROM pasien WHERE email = '$email' AND otp != '1'");

  if ($cekOTP > 0) {
    setcookie("emailOTP", $email, time() + 300, "/");
    header("location: ../../userinterface/verifikasiotp.php");
    die;
  }
  $row = query("SELECT password FROM pasien WHERE email = '$email'")[0];

  if (password_verify($password, $row["password"])) {
    $_SESSION['emailPasien'] = $email;
    $_SESSION['statusPasien'] = 'login';
    header("location:../../userinterface/riwayatrekammedis.php");
  } else {
    header("location:../../userinterface/index.php?pesan=gagal");
  }
} else {
  header("location:../../userinterface/index.php?pesan=gagal");
}
