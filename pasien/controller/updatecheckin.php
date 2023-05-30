<?php
include '../../template/functions.php';

$idrekammedis = input($_GET['q']);
mysqli_query($koneksi, "UPDATE rekammedis SET checkin = '1' WHERE idrekammedis = '$idrekammedis'");
header("location: ../userinterface/riwayatrekammedis.php");
