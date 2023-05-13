<?php 
if (isset($_GET['pesan'])){
  if ($_GET['pesan'] == 'gagal'){
    echo "<div class='alert alert-danger text-center'>Email atau Password Salah</div>";
  }else if ($_GET['pesan'] == 'logout'){
    echo "<div class='alert alert-success text-center'>Berhasil Logout</div>";
  }else if ($_GET['pesan'] == 'belumlogin'){
    echo "<div class='alert alert-warning text-center'>Anda Harus Login Untuk Akses Halaman Tersebut</div>";
  }
}

