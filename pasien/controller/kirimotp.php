<?php
include '../../template/functions.php';

if (is_null($_COOKIE['id'])) {
  header("location: index.php");
  die;
}

$idPasien = input($_GET['q']);
$emailHash = input($_COOKIE['id']);
$dataPasien = query("SELECT * FROM pasien WHERE idpasien = '$idPasien'")[0];

if (md5($dataPasien['email']) !== $emailHash) {
  header("location: ../userinterface/index.php");
  die;
}

$otpBaru = rand(1, 1000000);


ini_set('display_errors', 1);
error_reporting(E_ALL);

// Required variables
$FROMEMAIL  = '"TomeHealth" <cs@21120055rekammedis.my.id>';
$TOEMAIL    = $dataPasien['email'];
$SUBJECT    = "Kode OTP";
$PLAINTEXT  = "Salam Hangat";
$RANDOMHASH = "anyrandomhash";
$FICTIONALSERVER = "@21120055lrekammedis.my.id";


// Basic headers
$headers = "From: " . $FROMEMAIL . "\n";
$headers .= "Reply-To: " . $FROMEMAIL . "\n";
$headers .= "Return-path: " . $FROMEMAIL . "\n";
$headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
$headers .= "Kepada {$dataPasien['nama']}, \n";
$headers .= "Kode OTP anda adalah $otpBaru \n";

// Convert plain text body to quoted printable
$message = quoted_printable_encode($PLAINTEXT);

// Create a BASE64 encoded subject
$subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

// Send email
mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);


$otphash = password_hash($otpBaru, PASSWORD_DEFAULT);
mysqli_query($koneksi, "UPDATE pasien SET otp = '$otpBaru' WHERE email = '{$dataPasien['email']}'");

echo "<script>
  alert('Kode berhasil terkirim, Silahkan cek Email Anda');
  document.location.href = '../userinterface/verifikasiemail.php';
</script>";
