<?php
$emailAdmin = $_SESSION['emailAdmin'];
$dataAdmin = query("SELECT * FROM karyawan WHERE email = '$emailAdmin'")[0];

?>

<nav class="navbar">
  <div class="header">
    <img src="../aset/img/profile/user.png" alt="Profile" />
    <h1>Tome Health</h1>
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
      <li><a href="#"><i class="fa-solid fa-moon" id="theme"></i> Mode</a></li>
      <li><a href="#" id="modalTargetProfile"><i class="fa-solid fa-user"></i> Profile</a></li>
      <li><a href="../controller/other/ceklogout.php" onclick="return confirm('Logout Sekarang?')"> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Logout</a></li>
    </ul>
  </div>

  <ul class="nav-link">
    <li><a href="datakaryawan.php"><i class="fa-solid fa-user-doctor"></i>Karyawan</a></li>
    <li><a href="datapasien.php"><i class="fa-solid fa-head-side-mask"></i>Pasien</a></li>
    <li><a href="datakeahliandokter.php"><i class="fa-solid fa-stethoscope"></i>Keahlian Dokter</a></li>
    <li><a href="datapoli.php"><i class="fa-solid fa-briefcase-medical"></i>Poli</a></li>
    <li><a href="dataruang.php"><i class="fa-solid fa-door-open"></i>Ruang</a></li>
    <li><a href="datajadwalkaryawan.php"><i class="fa-regular fa-calendar"></i>Jadwal Karyawan</a></li>
    <li><a href="datarekammedis.php"><i class="fa-solid fa-scroll"></i>Rekam Medis</a></li>
    <li><a href="datapenyakit.php"><i class="fa-solid fa-viruses"></i>Penyakit</a></li>
    <li><a href="dataobat.php"><i class="fa-solid fa-pills"></i>Obat</a></li>
    <li><a href="datakamar.php"><i class="fa-solid fa-solid fa-bed"></i>Kamar</a></li>
    <li><a href="datarawatinap.php"><i class="fa-solid fa-bed-pulse"></i>Rawat Inap</a></li>
    <li><a href="datadetailperawatjaga.php"><i class="fa-solid fa-user-nurse"></i>Perawat Jaga</a></li>
    <li><a href="datacekkebersihan.php"><i class="fa-solid fa-broom"></i>Kebersihan</a></li>
    <li><a href="pesan.php"><i class="fa-solid fa-envelopes-bulk"></i>Pesan</a></li>
  </ul>
</nav>

<div class="modal lg" id="modalProfile">
  <div class="modal-content">
    <div class="modal-header">
      <h3>Profile</h3>
      <i class="fas fa-close" id="iconModalTutupProfile"></i>
    </div>
    <div class="modal-body">
      <div class="profile">
        <img src="../aset/img/user.png" alt="">
        <div class="deskripsi">
          <div class="label">
            <p>Nama</p>
            <p>Tempat Lahir</p>
            <p>Tanggal Lahir</p>
            <p>Jenis Kelamin</p>
            <p>Alamat</p>
            <p>Email</p>
            <p>Telepon</p>
          </div>
          <div class="data">
            <p><?= $dataAdmin['nama']; ?> ornai barros</p>
            <p><?= $dataAdmin['tempatlahir']; ?></p>
            <p><?= tanggal($dataAdmin['tanggallahir']); ?></p>
            <p><?= $dataAdmin['jeniskelamin']; ?></p>
            <p><?= $dataAdmin['alamat']; ?></p>
            <p><?= $dataAdmin['email']; ?></p>
            <p><?= $dataAdmin['telepon']; ?></p>
          </div>
        </div>

      </div>

    </div>
    <div class="modal-footer">
      <button class="tombol btn-tutup secondary" type="button" id="tutupModalProfile">Tutup</button>
    </div>
  </div>
</div>