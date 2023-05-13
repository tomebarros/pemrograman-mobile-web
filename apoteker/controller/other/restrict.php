<?php 
session_start();

if ($_SESSION['statusApoteker'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}


?>