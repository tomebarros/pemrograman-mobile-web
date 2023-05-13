<?php 
session_start();


$_SESSION['emailPerawatPendaftaran'] = '';
$_SESSION['statusPerawatPendaftaran'] = '';

unset($_SESSION['emailPerawatPendaftaran']);
unset($_SESSION['statusPerawatPendaftaran']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");


?>