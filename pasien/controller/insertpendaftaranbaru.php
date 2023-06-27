<?php
include '../../template/functions.php';


$nama = ucwords(input($_POST['nama']));
$tempatlahir = ucwords(input($_POST['tempatlahir']));
$tanggallahir = input($_POST['tanggallahir']);
$jeniskelamin = input($_POST['jeniskelamin']);
$alamat = ucwords(input($_POST['alamat']));
$telepon = input($_POST['telepon']);
$email = input($_POST['email']);

$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// cek duplikasi data
$cekDuplikasi = getData("SELECT * FROM pasien WHERE email = '$email'");
if ($cekDuplikasi > 0) {
  echo "<script>
    alert('Email Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
}


$passwordhash = password_hash($password, PASSWORD_DEFAULT);

// var_dump($passwordhash);
// die;


// menginput data ke database
mysqli_query($koneksi, "insert into pasien values('','$nama','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$telepon','$email','$passwordhash')");

// mengalihkan halaman kembali ke index.php
header("location:../userinterface/index.php?pesan=daftar");
