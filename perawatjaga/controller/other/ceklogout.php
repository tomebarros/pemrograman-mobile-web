<?php 
session_start();


$_SESSION['emailperawatjaga'] = '';
$_SESSION['status'] = '';

unset($_SESSION['emailPerawatJaga']);
unset($_SESSION['statusPerawatJaga']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
