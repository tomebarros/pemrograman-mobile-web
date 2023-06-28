<?php
include '../../template/functions.php';

if (!isset($_GET['q']) or !isset($_GET['k'])) {
  echo "<script>
  alert('Link Tidak Valid !!!');
  document.location.href = 'lupapassword.php';
  </script>";
  die;
}

$dataPasien = query("SELECT email,password FROM pasien");

$email = input($_GET['q']);
$key = input($_GET['k']);

// var_dump($dataPasien);

// ketersediaan key
$kunci = false;
foreach ($dataPasien as $d) {
  if (md5($d['password']) == $key and md5($d['email']) == $email) {
    $emailPasien = $d['email'];
    $kunci = true;
  }
}

if (!$kunci) {
  echo "<script>
  alert('Kunci Tidak Valid !!');
  document.location.href = 'lupapassword.php';
  </script>";
  die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Reset Password</title>

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="../aset/css/style.css" />
  <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
</head>

<body>

  <div class="container">
    <div class="alert"></div>
    <form action="../controller/resetpassword.php" method="post">
      <input type="hidden" name="email" value="<?= $emailPasien; ?>">
      <h1>Reset Password</h1>
      <div class="input-group">
        <input type="password" name="passwordbaru" required autocomplete="off" />
        <span>Password Baru</span>
      </div>

      <div class="input-group">
        <input type="password" name="passwordverifikasi" required />
        <span>Password Verifikasi</span>
      </div>
      <div class="lupa-password">
        <a class="warning">harap menggunakan password yang kombinasi antara huruf, angka dan simbol</a>
      </div>
      <button type="submit">Reset</button>

      <div class="title">
        <span></span>
        <p>TomeHealth</p>
        <span></span>
      </div>

    </form>
  </div>

  <script src="../aset/js/dark-mode.js"></script>
  <!-- <script src="../aset/js/pesan.js"></script> -->

</body>

</html>