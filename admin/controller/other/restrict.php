<?php 
session_start();

if ( $_SESSION['statusAdmin'] != 'login' ){
  header("location:index.php?pesan=belumlogin");
}
