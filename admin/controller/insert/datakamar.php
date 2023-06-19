<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$nama = input($_POST['nama']);
$kelas = input($_POST['kelas']);
$harga = input($_POST['harga']);

$duplikasi = getData("SELECT * FROM kamar WHERE nama LIKE '$nama'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "insert into kamar values('','$nama','$kelas','$harga')");
  header("location:../../userinterface/datakamar.php");
}
