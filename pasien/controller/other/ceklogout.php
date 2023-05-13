<?php 
session_start();


$_SESSION['emailpasien'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailPasien']);
unset($_SESSION['statusPasien']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
