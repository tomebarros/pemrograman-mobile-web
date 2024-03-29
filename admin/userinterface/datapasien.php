<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Pasien</title>

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
        <h1>Data Pasien</h1>
        <i class="fa-solid fa-chevrons"></i>
      </div>
      <div class="row">
        <div class="kiri">
          <form action="../controller/insert/datapasien.php" method="POST">
            <div class="input">
              <input type="text" class="form-input" required placeholder="Nama" name="nama">
            </div>

            <div class="input">
              <input type="text" class="form-input" required placeholder="Tempat Lahir" name="tempatlahir">
            </div>

            <div class="input">
              <input type="date" class="form-input" required placeholder="Tanggal Lahir" name="tanggallahir">
            </div>

            <div class="input">
              <select name="jeniskelamin" class="form-select" required>
                <option value="">Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="input">
              <input type="text" class="form-input" required placeholder="Alamat" name="alamat">
            </div>

            <div class="input">
              <input type="number" class="form-input" required placeholder="Telepon" name="telepon">
            </div>

            <div class="input">
              <input type="email" class="form-input" required placeholder="Email" name="email">
            </div>

            <div class="input">
              <input type="password" class="form-input" required placeholder="Password" name="password">
            </div>
            <button class="tombol" type="submit">Tambah</button>
          </form>
        </div>

        <div class="kanan">
          <?php include '../view/datapasien.php'; ?>
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
    // const tombolModalClose = modal.querySelector('#tutupModalUbah');
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
        const atrTempatLahir = btnUbah.getAttribute('tempatlahir');
        const atrTanggalLahir = btnUbah.getAttribute('tanggallahir');
        const atrJenisKelamin = btnUbah.getAttribute('jeniskelamin');
        const atrAlamat = btnUbah.getAttribute('alamat');
        const atrTelepon = btnUbah.getAttribute('telepon');
        const atrEmail = btnUbah.getAttribute('email');
        const atrPassword = btnUbah.getAttribute('password');
        const atrIdKaryawan = btnUbah.getAttribute('idpasien');

        // Elemen modal
        const modalNama = formUbah.querySelector('input[name="nama"]');
        const modalTempatLahir = formUbah.querySelector('input[name="tempatlahir"]');
        const modalTanggalLahir = formUbah.querySelector('input[name="tanggallahir"]');
        const modalJenisKelamin = formUbah.querySelector('select[name="jeniskelamin"]');
        const modalAlamat = formUbah.querySelector('input[name="alamat"]');
        const modalTelepon = formUbah.querySelector('input[name="telepon"]');
        const modalEmail = formUbah.querySelector('input[name="email"]');
        const modalPassword = formUbah.querySelector('input[name="password"]');
        const modalIdKaryawan = formUbah.querySelector('input[name="idpasien"]');

        modalNama.value = atrNama;
        modalTempatLahir.value = atrTempatLahir;
        modalTanggalLahir.value = atrTanggalLahir;
        modalJenisKelamin.value = atrJenisKelamin;
        modalAlamat.value = atrAlamat;
        modalTelepon.value = atrTelepon;
        modalEmail.value = atrEmail;
        modalPassword.value = atrPassword;
        modalIdKaryawan.value = atrIdKaryawan;
      });
    });
  </script>
</body>

</html>