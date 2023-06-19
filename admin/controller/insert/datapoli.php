<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$namaPoli = input($_POST['namapoli']);

$duplikasi = getData("SELECT namapoli FROM poli WHERE namapoli LIKE '$namaPoli'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "insert into poli values('','$namaPoli')");
  header("location:../../userinterface/datapoli.php");
}
