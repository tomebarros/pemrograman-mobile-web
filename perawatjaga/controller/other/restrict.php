<?php 
session_start();

if ($_SESSION['statusPerawatJaga'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}

?>