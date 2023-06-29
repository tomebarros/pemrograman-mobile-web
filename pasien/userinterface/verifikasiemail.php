<?php
include "../../template/functions.php";

if (is_null($_COOKIE['id'])) {
  header("location: index.php");
  die;
}
$emailHash = input($_COOKIE['id']);
$akses = false;
$dataPasien = query("SELECT * FROM pasien");
foreach ($dataPasien as $d) {
  if ($emailHash === md5($d['email'])) {
    $emailDecript = $d['email'];
    $id = $d['idpasien'];
    $akses = true;
  }
}
if (!$akses) {
  header("location: index.php");
  die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | OTP</title>

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
    <form action="../controller/updateotp.php" method="post">
      <h1>Verifikasi OTP</h1>
      <input type="hidden" name="email" required autocomplete="off" value="<?= $emailDecript ?>" />


      <div class="input-group">
        <input type="number" id name="otp" required />
        <span>Kode OTP</span>
      </div>
      <div class="lupa-password">
        <a class="warning">Silahkan cek kode OTP yang terkirim di di Email Anda</a>
        <a href="../controller/kirimotp.php?q=<?= $id; ?>">Kirim Ulang</a>
      </div>
      <button type="submit">Verifikasi</button>

      <div class="title">
        <span></span>
        <p>-</p>
        <span></span>
      </div>

    </form>
  </div>

  <script src="../aset/js/dark-mode.js"></script>
  <script src="../aset/js/pesan.js"></script>

</body>

</html>