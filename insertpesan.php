<?php
include 'template/functions.php';
// var_dump($_POST);
// die;

$nama = input($_POST['nama']);
$email = input($_POST['email']);
$pesan = input($_POST['pesan']);

mysqli_query($koneksi, "INSERT INTO pesan VALUES('', '$nama', '$email', '$pesan')");



ini_set('display_errors', 1);
error_reporting(E_ALL);

// Required variables
$FROMEMAIL  = '"AtoLaundry" <cs@21120055rekammedis.my.id>';
$TOEMAIL    = $email;
$SUBJECT    = "Pesan TomeHealth";
$PLAINTEXT  = "Admin TomeHealth akan segera membalas pesan Anda\n";
$PLAINTEXT  .= "Salam Hangat 21120055rekammedis.my.id";
$RANDOMHASH = "anyrandomhash";
$FICTIONALSERVER = "@21120055lrekammedis.my.id";


// Basic headers
$headers = "From: " . $FROMEMAIL . "\n";
$headers .= "Reply-To: " . $FROMEMAIL . "\n";
$headers .= "Return-path: " . $FROMEMAIL . "\n";
$headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
$headers .= "21120055rekammedis.my.id\n";
$headers .= "Dear $nama ,Terimah kasih atas pesan Anda yang Anda kirim di 21120055rekammedis.my.id \n";

// Add content type (plain text encoded in quoted printable, in this example)
$headers .= "$judul\r\n";

// Convert plain text body to quoted printable
$message = quoted_printable_encode($PLAINTEXT);

// Create a BASE64 encoded subject
$subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

// Send email
mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);




header("location: index.php#contact");
