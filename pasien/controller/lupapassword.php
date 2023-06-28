<?php
include '../../template/functions.php';

$emailLupaPassword = input($_POST['email']);

// cek email terdaftar
$emailTerdaftar = getData("SELECT * FROM pasien WHERE email = '$emailLupaPassword'");
if ($emailTerdaftar == 0) {
  echo "<script>
  alert('Email yang Anda masukan tidak terdaftar di TomeHealth !!!');
  history.go(-1);
  </script>";
  die;
}

// cek email sudah validasi atau belum (arahkan ke halaman verifikasi)
$emailVerifikasi = getData("SELECT * FROM pasien WHERE email = '$emailLupaPassword' AND otp = '1'");
if ($emailVerifikasi == 0) {
  setcookie("emailOTP", $emailLupaPassword, time() + 300, "/");
  echo "<script>
  alert('Email Anda belum melakukan Verifikasi !!!');
  document.location.href = '../userinterface/verifikasiemail.php';
  </script>";
  die;
}

// urutkan link halaman ganti password yang akan kirim ke user
$dataPasien = query("SELECT email,password,nama FROM pasien WHERE email = '$emailLupaPassword'")[0];
$emailHash = md5($dataPasien['email']);
$passwordHash = md5($dataPasien['password']);
$nama = $dataPasien['nama'];

$link = "21120055rekammedis.my.id/pasien/userinterface/resetpassword.php?q={$emailHash}&k={$passwordHash}";

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Required variables
$FROMEMAIL  = '"TomeHealth" <cs@21120055rekammedis.my.id>';
$TOEMAIL    = $email;
$SUBJECT    = "Lupa Password";
$PLAINTEXT  = "Salam Hangat";
$RANDOMHASH = "anyrandomhash";
$FICTIONALSERVER = "@21120055lrekammedis.my.id";


// Basic headers
$headers = "From: " . $FROMEMAIL . "\n";
$headers .= "Reply-To: " . $FROMEMAIL . "\n";
$headers .= "Return-path: " . $FROMEMAIL . "\n";
$headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
$headers .= "Kepada $nama, \n";
$headers .= "Silahkan kunjungi link berikut untuk melakukan reset password. \n";
$headers .= "{$link} \n";


// Convert plain text body to quoted printable
$message = quoted_printable_encode($PLAINTEXT);

// Create a BASE64 encoded subject
$subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

// Send email
mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

echo "<script>
  alert('Silahkan cek Email Anda');
  document.location.href = '../userinterface/';
</script>";
