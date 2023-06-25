<?php
$nama = explode(' ', $dataAdmin['nama']);
$nama = $nama[0];
?>
<header>
  <p><?= $nama; ?></p>
  <?php
  $namaFile = $dataAdmin['idkaryawan'];
  if (file_exists("../aset/img/profile/$namaFile.png")) { ?>
    <img src="../aset/img/profile/<?= $namaFile; ?>.png" alt="Profile">
  <?php } else { ?>
    <img src="../aset/img/profile/user.png" alt="Profile">
  <?php } ?>

  <i class="fa-solid fa-bars" id="toggleNavbar"></i>
</header>