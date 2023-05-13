<?php 
session_start();


$_SESSION['emailPerawatPemeriksa'] = '';
$_SESSION['statusPerawatPemeriksa'] = '';

unset($_SESSION['emailPerawatPemeriksa']);
unset($_SESSION['statusPerawatPemeriksa']);

session_destroy();
session_unset();

header("location:../../userinterface/index.php?pesan=logout");
