<?php
$nama = namakaryawan($_SESSION['emailAdmin']);
?>
<nav class="navbar navbar-expand-lg bg-danger navbar-dark mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TomeHealth</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <div class="nav-link dropdown">
            <button class="btn dropdown-toggle btn-sm " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-circle-half" id="theme"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-bs-dropdown>
              <li><a class="dropdown-item" href="#" id="dark"><i class="bi bi-moon-stars-fill me-2"></i> Dark</a></li>
              <li><a class="dropdown-item" href="#" id="light"><i class="bi bi-sun-fill me-2"></i> Light</a></li>
            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link active" href="datakaryawan.php">Karyawan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datapasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datakeahliandokter.php">Keahlian Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datapoli.php">Poli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="dataruang.php">Ruang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datajadwalkaryawan.php">Jadwal Karyawan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datarekammedis.php">Rekam Medis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datapenyakit.php">Penyakit</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="dataobat.php">Obat</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="datakamar.php">Kamar</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="datarawatinap.php">Rawat Inap</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datadetailperawatjaga.php">Perawat Jaga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="datacekkebersihan.php">Kebersihan</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="pesan.php"><i class="bi bi-person-fill"></i><?= $nama; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../controller/other/ceklogout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>