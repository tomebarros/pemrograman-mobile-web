<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Lupa Password</title>

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
    <form action="../controller/lupapassword.php" method="post">
      <h1>Lupa Password</h1>
      <div class="input-group">
        <input type="email" id="email" name="email" required autocomplete="off" />
        <span>Email</span>
      </div>

      <div class="lupa-password">
        <a class="warning">Masukan Email yang terdaftar di TomeHealth</a>
      </div>
      <button type="submit">Kirim</button>

      <div class="title">
        <span></span>
        <p>Atau</p>
        <span></span>
      </div>

      <p>Belum punya Akun?<a href="pendaftaranbaru.php">Daftar</a> | <a href="../../index.php">Home</a> | <a href="index.php">Login</a></p>
    </form>
  </div>

  <script src="../aset/js/dark-mode.js"></script>
  <script src="../aset/js/pesan.js"></script>

</body>

</html>