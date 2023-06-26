<?php
include "../controller/other/restrict.php";
include "../../template/functions.php";
$idkaryawan = input($_GET['q']);
if (!isset($_GET['q']) or $idkaryawan == '') {
  header("location: datakaryawan.php");
}
$datakaryawan = query("SELECT * FROM karyawan WHERE idkaryawan = '$idkaryawan'")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TomeHealth | Karyawan</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,200&amp;display=swap" rel="stylesheet" />

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <link rel="stylesheet" href="../aset/css/style.css" />
  <link rel="stylesheet" href="../aset/css/profile.css" />
  <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
</head>

<body>

  <div class="modal-foto">
    <form action="../controller/insert/uploadprofile.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="idkaryawan" value="<?= $datakaryawan['idkaryawan'] ?>">
      <input type="file" required class="form-input" accept=".jpg, .png, .jpeg" name="foto">
      <button class="tombol" type="submit">Simpan</button>
    </form>
    <i class="fa-solid fa-close" id="tutupModal"></i>
  </div>

  <div class="container">
    <?php include '../aset/nav.php'; ?>
    <div class="content">
      <?php include '../aset/header.php'; ?>
      <div class="header">
        <i class="fa-solid fa-chevrons"></i>
      </div>

      <div class="profile">
        <div class="card">
          <div class="card-header">
            <p>okok</p>
          </div>

          <div class="header-profile">
            <div class="profile-img">

              <?php $namaFile = $datakaryawan['idkaryawan'] ?>
              <?php if (file_exists("../aset/img/profile/$namaFile.png")) { ?>
                <img src="../aset/img/profile/<?= $namaFile ?>.png" alt="Profile Karyawan">

                <div class="aksi">
                  <a href="../controller/delete/deleteprofile.php?q=<?= $datakaryawan['idkaryawan'] ?>" onclick="return confirm('Hapus Foto Profile?')"><i class="fa-solid fa-trash"></i></a>
                  <a href="../aset/img/profile/<?= $namaFile ?>.png" target="_blank"><i class="fa-solid fa-image"></i></a>
                </div>

              <?php } else { ?>
                <img src="../aset/img/profile/user.png" alt="Profile Karyawan">
                <div class="aksi up">
                  <a href="#" id="tombolUpload"><i class="fa-solid fa-cloud-arrow-up"></i></a>
                </div>
              <?php } ?>

            </div>

            <div class="contact">
              <h3><?= $datakaryawan['nama']; ?></h3>
              <a href="#"><i class="fa-solid fa-envelope"></i></a>
              <a href="#"><i class="fa-solid fa-phone"></i></a>
            </div>
          </div>


          <div class="card-body">

            <table>
              <tr>
                <th>Pekerjaan</th>
                <td><?= $datakaryawan['pekerjaan']; ?></td>
              </tr>

              <tr>
                <th>Jenis Kelamin</th>
                <td><?= $datakaryawan['jeniskelamin']; ?></td>
              </tr>

              <tr>
                <th>Tanggal Lahir</th>
                <td><?= tanggal($datakaryawan['tanggallahir']); ?></td>
              </tr>

              <tr>
                <th>Tempat Lahir</th>
                <td><?= $datakaryawan['tempatlahir']; ?></td>
              </tr>

              <tr>
                <th>Alamat</th>
                <td><?= $datakaryawan['alamat']; ?></td>
              </tr>

              <tr>
                <th>Telepon</th>
                <td><?= $datakaryawan['telepon']; ?></td>
              </tr>

              <tr>
                <th>Email</th>
                <td><?= $datakaryawan['email']; ?></td>
              </tr>

            </table>
          </div>

        </div>
      </div>


    </div>
  </div>

  <script src="../aset/js/script.js"></script>

  <script>
    const uploadTombol = document.querySelector('#tombolUpload');
    const tutupModal = document.querySelector('#tutupModal');
    const modalFoto = document.querySelector('.modal-foto');

    console.log(modalFoto);

    uploadTombol.addEventListener('click', function(e) {
      e.preventDefault();

      modalFoto.classList.toggle('show')
    });

    tutupModal.addEventListener('click', function() {
      modalFoto.classList.remove('show')
    })
  </script>

</body>

</html>