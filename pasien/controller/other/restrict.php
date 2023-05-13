<?php
session_start();

if ($_SESSION['statusPasien'] != 'login') {
  header("location:index.php?pesan=belumlogin");
}
