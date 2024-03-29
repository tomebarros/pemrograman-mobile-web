<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Penyakit</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&amp;display=swap" rel="stylesheet" />

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="../aset/css/style.css" />
  <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <?php include '../aset/nav.php'; ?>
    <div class="content">
      <?php include '../aset/header.php'; ?>
      <div class="header">
        <h1>Data Penyakit</h1>
        <i class="fa-solid fa-chevrons"></i>
      </div>

      <div class="row">

        <div class="kiri">

          <form action="../controller/insert/datapenyakit.php" method="POST">
            <div class="input">
              <input type="text" class="form-input" required placeholder="Nama Penyakit" name="nama">
            </div>

            <button class="tombol" type="submit">Tambah</button>
          </form>
        </div>

        <div class="kanan">
          <?php include '../view/datapenyakit.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <script src="../aset/js/script.js"></script>
  <script>
    // Mengambil elemen-elemen yang diperlukan
    const table = document.querySelector('table');
    const btnUbahs = document.querySelectorAll('#modalTargetUbah');
    const modal = document.querySelector('#modalUbah');
    const formUbah = document.forms['Ubah'];

    // Menutup modal saat tombol Tutup atau ikon close diklik
    document.querySelector('#iconModalTutupUbah').addEventListener('click', () => {
      modal.style.display = 'none';
    });

    document.querySelector('#tutupModalUbah').addEventListener('click', () => {
      modal.style.display = 'none';
    });


    // Menambahkan event listener pada setiap tombol Ubah
    btnUbahs.forEach((btnUbah) => {
      btnUbah.addEventListener('click', () => {
        // e.preventDefault();
        modal.style.display = 'block';

        const atrNamaPenyakit = btnUbah.getAttribute('nama');
        const atrIdPenyakit = btnUbah.getAttribute('idpenyakit');

        // Elemen modal
        const modalNama = formUbah.querySelector('input[name="nama"]');
        const modalIdPenyakit = formUbah.querySelector('input[name="idpenyakit"]');

        modalNama.value = atrNamaPenyakit;
        modalIdPenyakit.value = atrIdPenyakit;
      });
    });

    // modal profile
    const modalProfile = document.querySelector('#modalProfile');
    document.querySelector('#modalTargetProfile').addEventListener('click', function(e) {
      e.preventDefault();
      modalProfile.style.display = 'block';
    });

    document.querySelector('#iconModalTutupProfile').addEventListener('click', () => {
      modalProfile.style.display = 'none';
    });

    document.querySelector('#tutupModalProfile').addEventListener('click', () => {
      modalProfile.style.display = 'none';
    });
  </script>
</body>

</html>