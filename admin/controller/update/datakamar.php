<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$nama = input($_POST['nama']);
$kelas = input($_POST['kelas']);
$harga = input($_POST['harga']);

$idkamar = input($_POST['idkamar']);

$duplikasi = getData("SELECT * FROM kamar WHERE nama LIKE '$nama' AND idkamar != '$idkamar'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "update kamar set nama='$nama', kelas='$kelas', harga='$harga' where idkamar='$idkamar'");
  header("location: ../../userinterface/datakamar.php");
}
