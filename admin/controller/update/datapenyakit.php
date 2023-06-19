<?php
include '../../../template/functions.php';
include '../other/restrict.php';

// menangkap data yang di kirim dari form
$nama = input($_POST['nama']);
$idpenyakit = input($_POST['idpenyakit']);

$duplikasi = getData("SELECT * FROM penyakit WHERE nama LIKE '$nama' AND idpenyakit != '$idpenyakit'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "update penyakit set nama='$nama' where idpenyakit='$idpenyakit'");
  header("location: ../../userinterface/datapenyakit.php");
}
