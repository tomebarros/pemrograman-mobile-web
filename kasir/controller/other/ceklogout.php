<?php 
session_start();


$_SESSION['emailkasir'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailKasir']);
unset($_SESSION['statusKasir']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
