<?php 
session_start();
if($_SESSION['statusChef'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}

?>