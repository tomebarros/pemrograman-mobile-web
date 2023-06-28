<?php
include '../../template/functions.php';

$email = input($_POST['email']);
$passwordbaru = mysqli_real_escape_string($koneksi, $_POST['passwordbaru']);
$passwordverifikasi = mysqli_real_escape_string($koneksi, $_POST['passwordverifikasi']);

// cek kesamaan pass baru sama pass verifikasi
if ($passwordbaru !== $passwordverifikasi) {
  echo "
    <script>
    alert('Password BARU dan password VERIFIKASI tidak valid !!');
    history.go(-1);
    </script>
    ";
  die;
}

// enkripsi password baru
$passwordHash = password_hash($passwordbaru, PASSWORD_DEFAULT);
$berhasilUpdate = mysqli_query($koneksi, "UPDATE pasien SET password = '$passwordHash' WHERE email = '$email'");

if ($berhasilUpdate) {
  echo "
    <script>
    alert('Password berhasil di Ubah');
    document.location.href = '../userinterface/';
    </script>
    ";
  die;
} else {
  echo "
    <script>
    alert('Password Gagal di Ubah');
    document.location.href = '../userinterface/';
    </script>
    ";
  die;
}
