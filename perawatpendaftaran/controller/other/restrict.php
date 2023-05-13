<?php 
session_start();

if  ($_SESSION['statusPerawatPendaftaran'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}
?>