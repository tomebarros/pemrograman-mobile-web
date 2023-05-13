<?php 
session_start();


$_SESSION['emailcs'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailCS']);
unset($_SESSION['statusCS']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
