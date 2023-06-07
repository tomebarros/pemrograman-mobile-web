<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Jadwal Karyawan</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&amp;display=swap" rel="stylesheet" />

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="../aset/css/style.css" />
  <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
</head>

<body>

  <i class="fa-solid fa-bars" id="toggleNavbar"></i>

  <div class="container">

    <?php include '../aset/nav.php'; ?>

    <div class="content">
      <div class="header">
        <h1>Data Jadwal Karyawan</h1>
        <i class="fa-solid fa-chevrons"></i>
      </div>

      <div class="row">

        <div class="kiri">

          <form action="../controller/insert/datajadwalkaryawan.php" method="POST">
            <div class="input">
              <select name="idkaryawan" class="form-select" required>
                <option value="">Pilih Karyawan</option>
                <?php
                $idkaryawan = query("SELECT * FROM karyawan");
                foreach ($idkaryawan as $d2) {
                  echo "<option value='{$d2['idkaryawan']}'>{$d2['nama']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="input">
              <select name="idruang" class="form-select" required>
                <option value="">Pilih Ruang</option>
                <?php
                $idRuang = query("SELECT * FROM ruang");
                foreach ($idRuang as $d2) {
                  echo "<option value='{$d2['idruang']}'>{$d2['namaruang']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="input">
              <select name="hari" required class="form-select">
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
              </select>
            </div>

            <div class="input">
              <input type="time" class="form-input" required placeholder="Jam Mulai" name="jammulai">
            </div>

            <div class="input">
              <input type="time" class="form-input" required placeholder="Jam Selesai" name="jamselesai">
            </div>

            <div class="input-group mb-2">
              <select name="statusketersediaan" required class="form-select">
                <option value="">Ketersediaan</option>
                <option value="Ada">Ada</option>
                <option value="Tidak Ada">Tidak Ada</option>
              </select>
            </div>

            <button class="tombol" type="submit">Tambah</button>
          </form>
        </div>

        <div class="kanan">
          <?php include '../view/datajadwalkaryawan.php'; ?>
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

        const atrIdKaryawan = btnUbah.getAttribute('idkaryawan');
        const atrIdRuang = btnUbah.getAttribute('idruang');
        const atrHari = btnUbah.getAttribute('hari');
        const atrJamMulai = btnUbah.getAttribute('jammulai');
        const atrJamSelesai = btnUbah.getAttribute('jamselesai');
        const atrStatusKetersediaan = btnUbah.getAttribute('statusketersediaan');
        const atrIdJadwalKaryawan = btnUbah.getAttribute('idjadwalkaryawan');

        // Elemen modal
        const modalIdKaryawan = formUbah.querySelector('select[name="idkaryawan"]');
        const modalIdRuang = formUbah.querySelector('select[name="idruang"]');
        const modalHari = formUbah.querySelector('select[name="hari"]');
        const modalJamMulai = formUbah.querySelector('input[name="jammulai"]');
        const modalJamSelesai = formUbah.querySelector('input[name="jamselesai"]');
        const modalStatusKetersediaan = formUbah.querySelector('select[name="statusketersediaan"]');
        const modalIdJadwalKaryawan = formUbah.querySelector('input[name="idjadwalkaryawan"]');

        modalIdKaryawan.value = atrIdKaryawan;
        modalIdRuang.value = atrIdRuang;
        modalHari.value = atrHari;
        modalJamMulai.value = atrJamMulai;
        modalJamSelesai.value = atrJamSelesai;
        modalStatusKetersediaan.value = atrStatusKetersediaan;
        modalIdJadwalKaryawan.value = atrIdJadwalKaryawan;

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