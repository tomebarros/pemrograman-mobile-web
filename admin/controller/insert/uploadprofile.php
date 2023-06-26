<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$idkaryawan = input($_POST['idkaryawan']);

$temp = $_FILES['foto']['tmp_name'];
$name = $_FILES['foto']['name'];
$size = $_FILES['foto']['size'];
$ekstensi = $_FILES['foto']['type'];
$namaFile   = $idkaryawan . '.png';
$lokasiDirektoriFile = "../../aset/img/profile/";

$ekstensi_diperbolehkan  = array('image/png', 'image/jpg', 'image/jpeg');

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
  if ($size <= 1048576) {
    move_uploaded_file($temp, $lokasiDirektoriFile . $namaFile);
    header("location: ../../userinterface/profile.php?q=$idkaryawan");
  } else {
    echo "
    <script>
      alert('GAGAL UPLOAD!!!! Ukuran Gambar Melebihi 1MB...');
      document.location.href='../../userinterface/profile.php?q=$idkaryawan';
    </script>
    ";
  }
} else {
  echo "
    <script>
      alert('GAGAL UPLOAD!!!! Yang Anda Upload Bukan Gabar...');
      document.location.href='../../userinterface/profile.php?q=$idkaryawan';
    </script>
  ";
}
