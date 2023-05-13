<?php 
session_start();
if($_SESSION['statusDokter'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}

?>