<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tome Barros</title>

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&display=swap" rel="stylesheet" />

  <!-- fether icon -->
  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <nav class="navbar">
    <!-- <h1>Tome Health</h1> -->
    <img src="img/logo.png" alt="logo" class="logo" />

    <ul class="navbar-link">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="pasien/userinterface/">login</a></li>
    </ul>

    <label class="burger" for="burger">
      <input type="checkbox" id="burger" />
      <span></span>
      <span></span>
      <span></span>
    </label>
  </nav>

  <section id="home" class="hero">
    <div class="judul">
      <span></span>
      <h3>TomeHealth</h3>
      <span></span>
    </div>
    <p>Dedikasi untuk Kesehatan, Keunggulan dalam Perawatan</p>
  </section>

  <section id="about" class="about">
    <h3>Tentang Kami</h3>
    <div class="row">
      <div class="col kiri">
        <img src="img/about.jpg" alt="Tentang Kami" />
      </div>
      <div class="col kanan">
        <h4>Website Rumah Sakit</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quasi eligendi praesentium repellendus vitae error modi quisquam, esse quae molestias culpa similique ipsa? Quas beatae soluta accusamus eligendi fugit
          asperiores.
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
        <p>Lorem ipsum dolor sit amet.</p>
      </div>

      <div class="card">
        <img src="img/service2.jpg" alt="Gambar Ruang Inap" />
        <h4>~ Ruang Inap ~</h4>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>

      <div class="card">
        <img src="img/service3.jpg" alt="Gambar Ruang Inap VIP" />
        <h4>~ Ruang Inap VIP ~</h4>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
  </section>

  <footer>
    <div class="links">
      <p>Ikuti Kami Di:</p>
      <a href="https://www.instagram.com/tome_barros/" target="_blank"><i data-feather="instagram"></i> </a>
      <a href="https://www.youtube.com/@tomebarros2153" target="_blank"><i data-feather="youtube"></i></a>
      <a href="https://github.com/tomebarros" target="_blank"><i data-feather="github"></i></a>
    </div>

    <div class="copyright">
      <p>&copy; TomeHealth 2023</p>
    </div>

    <div class="login">
      <a href="admin/userinterface/">Admin</a>
      <a href="apoteker/userinterface/">Apoteker</a>
      <a href="dokter/userinterface/">Dokter</a>
      <a href="kasir/userinterface/">Kasir</a>
      <a href="perawatjaga/userinterface/">Perawat Jaga</a>
      <a href="perawatpemeriksa/userinterface/">Perawat Pemeriksa</a>
      <a href="perawatpendaftaran/userinterface/">Perawat Pendaftaran</a>
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>