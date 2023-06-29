<?php
include '../controller/other/restrict.php';
include '../../template/functions.php';

$email = $_SESSION['emailPasien'];
$idPasien = query("SELECT idpasien FROM pasien WHERE email = '$email'")[0]['idpasien'];

$idDokterPoli = input($_POST['iddokterpoli']);

$data = query("SELECT jadwalkaryawan.idjadwalkaryawan,poli.idpoli,jadwalkaryawan.idkaryawan, dokterpoli.iddokterpoli FROM jadwalkaryawan,karyawan,poli,dokterpoli WHERE jadwalkaryawan.statusketersediaan = 'Ada' and karyawan.pekerjaan = 'Dokter' and jadwalkaryawan.idkaryawan = karyawan.idkaryawan and poli.idpoli = dokterpoli.idpoli and dokterpoli.idkaryawan = karyawan.idkaryawan AND dokterpoli.iddokterpoli = '$idDokterPoli'")[0];

$fariabel1 = input($idPasien);
$fariabel2 = input($_POST['tanggalpelayanan']);
$fariabel3 = input($data['idjadwalkaryawan']);
$fariabel4 = input($data['idpoli']);
$fariabel5 = input($data['idkaryawan']);
$fariabel6 = input($_POST['keluhanawal']);

// var_dump($_POST);
mysqli_query($koneksi, "insert into rekammedis(idrekammedis,idpasien,tanggalpelayanan,idjadwalkaryawan,idpoli,idkaryawandokter,keluhanawal) values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6')");

// mengalihkan halaman kembali ke index.php
header("location:../userinterface/riwayatrekammedis.php");
