<?php
include '../../../template/functions.php';
include '../other/restrict.php';

// menangkap data yang di kirim dari form
$namaPoli = input($_POST['namapoli']);
$idpoli = input($_POST['idpoli']);

$duplikasi = getData("SELECT * FROM poli WHERE namapoli LIKE '$namaPoli' AND idpoli != '$idpoli'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "update poli set namapoli='$namaPoli' where idpoli='$idpoli'");
  header("location: ../../userinterface/datapoli.php");
}
