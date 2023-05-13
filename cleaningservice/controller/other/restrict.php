<?php 
session_start();

if ( $_SESSION['statusCS'] != 'login' ){
  header("location:index.php?pesan=belumlogin");
}

?>