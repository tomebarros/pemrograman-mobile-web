<?php
include '../../template/functions.php';
$nama = namapasien($_SESSION['emailPasien']);
?>

<nav class="navbar navbar-expand-lg bg-danger navbar-dark mb-3">
  <div class="container">
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
          <a class="nav-link active" href="riwayatrekammedis.php">Rekam Medis</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#ModalProfil"><i class="bi bi-person-fill"></i><?= $nama; ?></a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="../controller/other/ceklogout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>