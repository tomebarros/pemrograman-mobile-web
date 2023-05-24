<?php
include 'template/functions.php';
// var_dump($_POST);
// die;

$nama = ucwords(input($_POST['nama']));
$email = strtolower(input($_POST['email']));
$judul = input($_POST['judul']);
$pesan = input($_POST['pesan']);
$tanggal = date("Y-m-d");


mysqli_query($koneksi, "INSERT INTO pesan VALUES('', '$nama','$email', '$judul', '$pesan','$tanggal','0')");


ini_set('display_errors', 1);
error_reporting(E_ALL);

// Required variables
$FROMEMAIL  = '"TomeHealth" <cs@21120055rekammedis.my.id>';
$TOEMAIL    = $email;
$SUBJECT    = "Balasan Pesan Dari CS TomeHealth";
$PLAINTEXT  = "Salam Hangat, Tim 21120055rekammedis.my.id";
$RANDOMHASH = "anyrandomhash";
$FICTIONALSERVER = "@21120055lrekammedis.my.id";


// Basic headers
$headers = "From: " . $FROMEMAIL . "\n";
$headers .= "Reply-To: " . $FROMEMAIL . "\n";
$headers .= "Return-path: " . $FROMEMAIL . "\n";
$headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
$headers .= "Kepada $nama, \n";
$headers .= "Terima kasih atas pesan yang Anda kirimkan kepada Admin TomeHealth dengan judul '$judul'. \n";
$headers .= "Kami ingin memberikan tanggapan yang hangat dari 21120055rekammedis.my.id. Tim Customer Service kami akan segera menanggapi email Anda dalam waktu sesingkat mungkin. \n";
$headers .= "Terima kasih sekali lagi, dan jika Anda memiliki pertanyaan lebih lanjut atau butuh bantuan, jangan ragu untuk menghubungi kami. \n";


// Convert plain text body to quoted printable
$message = quoted_printable_encode($PLAINTEXT);

// Create a BASE64 encoded subject
$subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

// Send email
mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

echo "<script>
  alert('Pesan Anda berhasil terkirim, Terima Kasih');
  document.location.href = 'index.php#contact';
</script>";
