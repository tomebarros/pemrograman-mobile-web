<?php
include '../../../template/functions.php';
include '../other/restrict.php';

$idkaryawan = input($_GET['q']);
$lokasiDirektori = '../../aset/img/profile/';

$target = $lokasiDirektori . $idkaryawan . '.png';

if (file_exists($target)) {
  unlink($target);
}

header("location: ../../userinterface/profile.php?q=$idkaryawan");
