<?php
include '../../../template/functions.php';
include '../other/restrict.php';


$nama = input($_POST['nama']);
$biaya = input($_POST['biaya']);
$idpoli = input($_POST['idpoli']);


$duplikasi = getData("SELECT nama FROM keahliandokter WHERE nama like '$nama'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Teredia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "insert into keahliandokter values('','$nama','$biaya', '$idpoli')");
  header("location:../../userinterface/datakeahliandokter.php");
}
