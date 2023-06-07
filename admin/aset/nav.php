<?php
$emailAdmin = $_SESSION['emailAdmin'];
$dataAdmin = query("SELECT * FROM karyawan WHERE email = '$emailAdmin'")[0];

?>

<nav class="navbar">
  <div class="header">
    <img src="../aset/img/user.png" alt="Profile" />
    <i class="fa-solid fa-moon" id="theme"></i>
  </div>
  <div class="profile">
    <div class="kiri">
      <p><?= $dataAdmin['nama']; ?></p>
      <p><?= $dataAdmin['email']; ?></p>
    </div>
    <i class="fa-solid fa-chevron-down" id="dropdown"></i>
  </div>
  <div class="detail-profile">
    <ul>
      <li>
        <a href="#" id="modalTargetProfile"><i class="fa-solid fa-user"></i> Profile</a>
      </li>
      <li>
        <a href="../controller/other/ceklogout.php"> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Logout</a>
      </li>
    </ul>
  </div>

  <ul class="nav-link">
    <li><a href="datakaryawan.php">Karyawan</a></li>
    <li><a href="datapasien.php">Pasien</a></li>
    <li><a href="datakeahliandokter.php">Keahlian Dokter</a></li>
    <li><a href="datapoli.php">Poli</a></li>
    <li><a href="dataruang.php">Ruang</a></li>
    <li><a href="datajadwalkaryawan.php">Jadwal Karyawan</a></li>
    <li><a href="datarekammedis.php">Rekam Medis</a></li>
    <li><a href="datapenyakit.php">Penyakit</a></li>
    <li><a href="dataobat.php">Obat</a></li>
    <li><a href="datakamar.php">Kamar</a></li>
    <li><a href="datarawatinap.php">Rawat Inap</a></li>
    <li><a href="datadetailperawatjaga.php">Perawat Jaga</a></li>
    <li><a href="datacekkebersihan.php">Kebersihan</a></li>
  </ul>
</nav>