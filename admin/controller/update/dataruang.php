<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$namaRuang = input($_POST['namaruang']);
$idRuang = input($_POST['idruang']);

$duplikasi = getData("SELECT * FROM ruang WHERE namaruang LIKE '$namaRuang' AND idruang != '$idRuang'");

if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "update ruang set namaruang='$namaRuang' where idruang='$idRuang'");
  header("location: ../../userinterface/dataruang.php");
}
