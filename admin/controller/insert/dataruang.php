<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$namaRuang = input($_POST['namaruang']);

$duplikasi = getData("SELECT * FROM ruang WHERE namaruang LIKE '$namaRuang'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1)
  </script>";
  die;
} else {
  mysqli_query($koneksi, "insert into ruang values('','$namaRuang')");
  header("location:../../userinterface/dataruang.php");
}
