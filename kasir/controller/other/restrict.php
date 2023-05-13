<?php 
session_start();

if ($_SESSION['statusKasir'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}

?>