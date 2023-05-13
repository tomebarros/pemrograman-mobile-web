<?php
session_start();
include '../../template/functions.php';

$email = $_SESSION['emailPasien'];
$idPasien = query("SELECT idpasien FROM pasien WHERE email = '$email'")[0]['idpasien'];


$data = query("SELECT jadwalkaryawan.idjadwalkaryawan,jadwalkaryawan.idkaryawan,poli.idpoli FROM jadwalkaryawan, karyawan, poli, dokterpoli WHERE jadwalkaryawan.idkaryawan = karyawan.idkaryawan AND poli.idpoli = dokterpoli.idpoli AND dokterpoli.idkaryawan = karyawan.idkaryawan AND jadwalkaryawan.statusketersediaan = 'Ada' AND karyawan.pekerjaan = 'Dokter' AND poli.idpoli = {$_POST['idpoli']}")[0];

// var_dump($data);
// var_dump($_POST);
// die;


$fariabel1 = input($idPasien);
$fariabel2 = input($_POST['tanggalpelayanan']);
$fariabel3 = input($data['idjadwalkaryawan']);
$fariabel4 = input($_POST['idpoli']);
$fariabel5 = input($data['idkaryawan']);
$fariabel6 = input($_POST['keluhanawal']);

// var_dump($fariabel6);
// die;

// menginput data ke database
mysqli_query($koneksi, "insert into rekammedis(idrekammedis,idpasien,tanggalpelayanan,idjadwalkaryawan,idpoli,idkaryawandokter,keluhanawal) values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6')");

// mengalihkan halaman kembali ke index.php
header("location:../userinterface/riwayatrekammedis.php");
