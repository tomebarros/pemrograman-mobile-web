<?php 
session_start();


$_SESSION['emailAdmin'] = '';
$_SESSION['statusAdmin'] = '';

unset($_SESSION['emailadmin']);
unset($_SESSION['status']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");


?>