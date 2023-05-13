<?php 
session_start();

if($_SESSION['statusPerawatPemeriksa'] != 'login'){
  header("location:index.php?pesan=belumlogin");
}
?>