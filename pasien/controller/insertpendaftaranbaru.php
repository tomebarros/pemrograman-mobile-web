<?php
include '../../template/functions.php';


$nama = ucwords(input($_POST['nama']));
$tempatlahir = ucwords(input($_POST['tempatlahir']));
$tanggallahir = input($_POST['tanggallahir']);
$jeniskelamin = input($_POST['jeniskelamin']);
$alamat = ucwords(input($_POST['alamat']));
$telepon = input($_POST['telepon']);
$email = input($_POST['email']);


// cek duplikasi data
// $cekDuplikasi = getData("SELECT * FROM pasien WHERE email = '$email'");
// if ($cekDuplikasi > 0) {
//   echo "<script>
//     alert('Email Sudah Tersedia');
//     history.go(-1);
//   </script>";
//   die;
// }

// enkripsi password
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$passwordhash = password_hash($password, PASSWORD_DEFAULT);

// kode otp
$otp = rand(1, 1000000);

// krim otp ke email

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Required variables
$FROMEMAIL  = '"TomeHealth" <cs@21120055rekammedis.my.id>';
$TOEMAIL    = $email;
$SUBJECT    = "Kode OTP";
$PLAINTEXT  = "Salam Hangat, Tim 21120055rekammedis.my.id";
$RANDOMHASH = "anyrandomhash";
$FICTIONALSERVER = "@21120055lrekammedis.my.id";


// Basic headers
$headers = "From: " . $FROMEMAIL . "\n";
$headers .= "Reply-To: " . $FROMEMAIL . "\n";
$headers .= "Return-path: " . $FROMEMAIL . "\n";
$headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
$headers .= "Kepada $nama, \n";
$headers .= "Kode OTP Anda adalah $otp. \n";
$headers .= "Harap Tidak membagikan ke siapa pun \n";


// Convert plain text body to quoted printable
$message = quoted_printable_encode($PLAINTEXT);

// Create a BASE64 encoded subject
$subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

// Send email
mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

// kirim pesan end

// enkripsi otp
$otphash = password_hash($otp, PASSWORD_DEFAULT);

// menginput data ke database
mysqli_query($koneksi, "insert into pasien values('','$nama','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$telepon','$email','$passwordhash','$otphash')");

// die;
// mengalihkan halaman kembali ke index.php
header("location:../userinterface/index.php?pesan=daftar");
