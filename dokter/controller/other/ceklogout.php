<?php 
session_start();


$_SESSION['emaildoter'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailDokter']);
unset($_SESSION['statusDokter']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
