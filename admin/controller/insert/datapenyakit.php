<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$nama = input($_POST['nama']);

$duplikasi = getData("SELECT * FROM penyakit WHERE nama LIKE '$nama'");
if ($duplikasi > 0) {
  echo "<script>
    alert('Data Sudah Tersedia');
    history.go(-1);
  </script>";
  die;
} else {
  mysqli_query($koneksi, "insert into penyakit values('','$nama')");
  header("location:../../userinterface/datapenyakit.php");
}
