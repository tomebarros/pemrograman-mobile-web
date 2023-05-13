<?php 
session_start();


$_SESSION['emailapoteker'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailApoteker']);
unset($_SESSION['status']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
