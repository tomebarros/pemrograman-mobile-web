<?php 
session_start();


$_SESSION['emailChef'] = '';
$_SESSION['statusChef'] = '';

unset($_SESSION['emailChef']);
unset($_SESSION['statusChef']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
