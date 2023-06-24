<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Keahlian Dokter</title>

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
        <h1>Data Keahlian Dokter</h1>
        <i class="fa-solid fa-chevrons"></i>
      </div>

      <div class="row">
        <div class="kiri">

          <form action="../controller/insert/datakeahliandokter.php" method="POST">
            <div class="input">
              <input type="text" class="form-input" required placeholder="Nama Keahlian" name="nama">
            </div>

            <div class="input">
              <input type="number" class="form-input" required placeholder="Biaya" name="biaya">
            </div>


            <div class="input">
              <select name="idpoli" class="form-select" required>
                <option value="">Pilih Poli</option>
                <?php
                $dataPoli = query("SELECT * FROM poli");
                foreach ($dataPoli as $d2) {
                  echo "<option value='{$d2['idpoli']}'>{$d2['namapoli']}</option>";
                }
                ?>
              </select>
            </div>

            <button class="tombol" type="submit">Tambah</button>
          </form>
        </div>

        <div class="kanan">
          <?php include '../view/datakeahliandokter.php'; ?>
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

        const atrNama = btnUbah.getAttribute('nama');
        const atrBiaya = btnUbah.getAttribute('biaya');
        const atrIdPoli = btnUbah.getAttribute('idpoli');
        const atrIdKeahlianDokter = btnUbah.getAttribute('idkeahliandokter');

        // Elemen modal
        const modalNama = formUbah.querySelector('input[name="nama"]');
        const modalBiaya = formUbah.querySelector('input[name="biaya"]');
        const modalIdPoli = formUbah.querySelector('select[name="idpoli"]');
        const modalIdKeahlianDokter = formUbah.querySelector('input[name="idkeahliandokter"]');

        modalNama.value = atrNama;
        modalBiaya.value = atrBiaya;
        modalIdPoli.value = atrIdPoli;
        modalIdKeahlianDokter.value = atrIdKeahlianDokter;
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