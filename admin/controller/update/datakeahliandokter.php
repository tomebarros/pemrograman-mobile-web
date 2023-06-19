<?php
include '../../../template/functions.php';
include '../other/restrict.php';
// menangkap data yang di kirim dari form
$nama = input($_POST['nama']);
$biaya = input($_POST['biaya']);
$idpoli = input($_POST['idpoli']);

$idkeahliandokter = input($_POST['idkeahliandokter']);


$duplikasi = getData("SELECT * FROM keahliandokter WHERE nama LIKE '$nama' AND idkeahliandokter != '$idkeahliandokter'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "update keahliandokter set nama='$nama', biaya='$biaya', idpoli='$idpoli' where idkeahliandokter='$idkeahliandokter'");
  header("location: ../../userinterface/datakeahliandokter.php");
}
