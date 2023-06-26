<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Pendaftaran Baru</title>

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
    <form action="../controller/insertpendaftaranbaru.php" method="post">
      <h1>Daftar</h1>

      <div class="input-group">
        <input type="text" id="nama" name="nama" required autocomplete="off" />
        <span>Nama</span>
      </div>

      <div class="input-group">
        <input type="text" id="tempatlahir" name="tempatlahir" required autocomplete="off" />
        <span>Tempat Lahir</span>
      </div>

      <div class="input-group">
        <input type="date" id="tanggallahir" name="tanggallahir" required autocomplete="off" />
        <span>Tanggal Lahir</span>
      </div>

      <div class="input-group">
        <select name="jeniskelamin" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="input-group">
        <input type="text" id="alamat" name="alamat" required autocomplete="off" />
        <span>Alamat</span>
      </div>

      <div class="input-group">
        <input type="number" id="telepon" name="telepon" required autocomplete="off" />
        <span>Telepon</span>
      </div>

      <div class="input-group">
        <input type="email" id="email" name="email" required autocomplete="off" />
        <span>Email</span>
      </div>

      <div class="input-group">
        <input type="password" id="password" name="password" required />
        <span>Password</span>
        <i class="fa-solid fa-lock" id="lock"></i>
      </div>
      <div class="lupa-password">
        <a class="warning">Harap menggunakan password yang ada kombinasi angka dan simbol</a>
      </div>
      <button type="submit">Daftar</button>

      <div class="title">
        <span></span>
        <p>Atau</p>
        <span></span>
      </div>

      <p>Sudah punya Akun?<a href="index.php">Login</a> | <a href="../../index.php">Home</a></p>
    </form>
  </div>

  <script src="../aset/js/dark-mode.js"></script>
  <script src="../aset/js/pesan.js"></script>

</body>

</html>