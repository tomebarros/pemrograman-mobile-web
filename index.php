<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tome Barros</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&amp;display=swap" rel="stylesheet">

  <!-- fether icon -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <!-- icon web -->
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <a target="_blank" href="https://api.whatsapp.com/send?phone=6282146199762&text=Dear+Admin+*TomeHealth*%0A%0A" class="cs">
    <img src="img/cs.png" alt="customer service">
  </a>

  <nav class="navbar">
    <!-- <h1>Tome Health</h1> -->
    <img src="img/logo.png" alt="logo" class="logo" />

    <ul class="navbar-link">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <div class="navbar-contain">
      <!-- <i class="fa-solid fa-moon-stars theme" id="theme-toggle"></i> -->
      <i class="bi bi-moon-fill theme" id="theme-toggle"></i>
      <label class="burger" for="burger">
        <input type="checkbox" id="burger" />
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>
  </nav>

  <section id="home" class="hero">
    <div class="judul">
      <span></span>
      <h3>TomeHealth</h3>
      <span></span>
    </div>
    <p>Dedikasi untuk Kesehatan, Keunggulan dalam Perawatan</p>
    <a href="pasien/userinterface/index.php">Login</a>
  </section>

  <section id="about" class="about">
    <h3>tentang kami</h3>
    <div class="row">
      <div class="col kiri">
        <img src="img/loby.jpg" alt="Tentang Kami" />
      </div>
      <div class="col kanan">
        <h4>website rumah sakit <span>tome Health</span></h4>
        <p>
          Menjadi penyedia layanan kesehatan terkemuka yang memberikan perawatan berkualitas, inovatif, dan holistik kepada masyarakat, dengan fokus pada kepuasan pasien, keunggulan klinis, dan penerapan teknologi medis terkini untuk meningkatkan keselamatan, kenyamanan, dan pemulihan pasien
        </p>
      </div>
    </div>
  </section>

  <section id="services" class="services">
    <h3>Pelayanan</h3>

    <div class="cards">
      <div class="card">
        <img src="img/service1.jpg" alt="Gambar Ruang Operasi" />
        <h4>~ Ruang Operasi ~</h4>
        <p>Ruang Operasi Pasien</p>
      </div>

      <div class="card">
        <img src="img/service2.jpg" alt="Gambar Ruang Inap" />
        <h4>~ Ruang Inap ~</h4>
        <p>Ruang Pasien Rawat Inap</p>
      </div>

      <div class="card">
        <img src="img/service3.jpg" alt="Gambar Ruang Inap VIP" />
        <h4>~ Ruang Inap VIP ~</h4>
        <p>Ruang Pasien Rawat Inap VIP</p>
      </div>

      <div class="card">
        <img src="img/service4.jpg" alt="Gambar Rumah Sakit TomeHealth" />
        <h4>~ Rumah Sakit ~</h4>
        <p>Rumah Sakit TomeHealth</p>
      </div>

      <div class="card">
        <img src="img/service5.jpg" alt="Gambar Website TomeHealth" />
        <h4>~ Website ~</h4>
        <p>Pelayanan Medis Berbasis Online</p>
      </div>
    </div>
  </section>


  <section id="contact" class="contact">
    <h3>Hubungi Kami</h3>
    <div class="row">
      <div class="kiri">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.216705553303!2d123.62013377517093!3d-10.163032889950795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56834e0db12415%3A0x4adc2c26430f6087!2sSTIKOM%20Uyelindo%20Kupang!5e0!3m2!1sid!2sid!4v1684666601821!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="kanan">
        <form method="POST" action="insertpesan.php">

          <div class="input-group">
            <input type="text" name="nama" required autocomplete="off">
            <span for="nama">Nama</span>
          </div>

          <div class="input-group">
            <input type="email" name="email" required autocomplete="off">
            <span>Email</span>
          </div>

          <div class="input-group">
            <input type="text" name="judul" required autocomplete="off">
            <span>Judul</span>
          </div>

          <div class="input-textarea">
            <textarea name="pesan" required></textarea>
            <span for="pesan">Pesan</span>
          </div>

          <button type="submit">Kirim</button>

        </form>
      </div>
    </div>

  </section>

  <footer>
    <div class="links">
      <p>ikuti kami</p>
      <i class="fab fa-instagram"></i>
      <a href="https://www.instagram.com/tome_barros/" target="_blank"><i class="bi bi-instagram"></i></a>
      <a href="https://www.youtube.com/@tomebarros2153" target="_blank"><i class="bi bi-youtube"></i></a>
      <a href="https://github.com/tomebarros" target="_blank"><i class="bi bi-github"></i></a>
    </div>

    <div class="login">
      <a href="admin/userinterface/">Admin</a>
      <a href="apoteker/userinterface/">Apoteker</a>
      <a href="dokter/userinterface/">Dokter</a>
      <a href="kasir/userinterface/">Kasir</a>
      <a href="perawatjaga/userinterface/">PerawatJaga</a>
      <a href="perawatpemeriksa/userinterface/">PerawatPemeriksa</a>
      <a href="perawatpendaftaran/userinterface/">PerawatPendaftaran</a>
    </div>

    <h4><a href="http://21120055rekammedis.my.id/">&copy; TomeHealth</a></h4>
  </footer>
  <script src="script.js"></script>
</body>

</html>