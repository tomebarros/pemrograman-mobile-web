<?php
include "../controller/other/restrict.php";
?>
<!doctype html>

<html lang="en">

<head>
  <title>Rekam Medis</title>
  <?php include "../../template/cdnbs5.php"; ?>

  <style>
    #resep:hover::before,
    #nota:hover::before,
    #datamedis:hover::before {
      position: absolute;
      top: -2.5rem;
      right: 1.9rem;
      border-radius: 1rem 1rem 0 1rem;
      background-color: #31d2f2;
      color: #010101;
      padding: 0.5rem 1rem;
      width: 7rem;
    }

    #resep:hover::before {
      content: 'Resep';
    }

    #nota:hover::before {
      content: 'Nota';
    }

    #datamedis:hover::before {
      content: 'Data Medis';
    }
  </style>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <h1>Riwayat Pelayanan</h1>

    <div class="row mb-2">
      <div class="col-md-3 d-grid">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalPendaftaran">Pendaftaran Pelayanan</button>
      </div>
      <div class="col-md-9">
        <?php
        $emailPasien = $_SESSION['emailPasien'];
        $idpasien = query("SELECT idpasien FROM pasien WHERE email = '$emailPasien'")[0]['idpasien'];
        $datamedis = getData("SELECT idpasien FROM rekammedis WHERE idpasien = '$idpasien'");
        if ($datamedis != 0) {
        ?>
          <input class="form-control" id="myInput" type="search" placeholder="Cari..">
        <?php } ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <?php
        // var_dump($datamedis);
        if ($datamedis > 0) {
          include '../view/riwayatrekammedis.php';
        } else {
          echo "<h5 class='text-center'>DATA BELUM ADA</h5>";
        }
        ?>

      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalPendaftaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pendaftaran Pelayanan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../controller/insertpelayanan.php" method="post">
            <div class="input-group mb-2">
              <span class="input-group-text">Tanggal Pelayanan</span>
              <input type="date" class="form-control" name="tanggalpelayanan" required>
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Jadwal Pelayanan</span>
              <select name="iddokterpoli" class="form-select" required>
                <option value=""></option>
                <?php
                $data = query("SELECT jadwalkaryawan.idjadwalkaryawan,jadwalkaryawan.idkaryawan,karyawan.nama,poli.idpoli,poli.namapoli,jadwalkaryawan.hari,jadwalkaryawan.jammulai,jadwalkaryawan.jamselesai, dokterpoli.iddokterpoli FROM jadwalkaryawan,karyawan,poli,dokterpoli WHERE jadwalkaryawan.statusketersediaan = 'Ada' and karyawan.pekerjaan = 'Dokter' and jadwalkaryawan.idkaryawan = karyawan.idkaryawan and poli.idpoli = dokterpoli.idpoli and dokterpoli.idkaryawan = karyawan.idkaryawan;");
                foreach ($data as $d) {
                ?>
                  <option value="<?php echo $d['iddokterpoli']; ?>"><?php echo $d['nama'] . ' | ' . $d['namapoli'] . ' | ' . $d['hari'] . ' | ' . $d['jammulai'] . '-' . $d['jamselesai']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Keluhan Awal</span>
              <input type="text" class="form-control" name="keluhanawal" required>
            </div>

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Daftar">
          </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>



  <?php
  $dataPasien = query("SELECT * FROM pasien WHERE email = '$emailPasien'")[0];
  ?>

  <!-- Modal -->
  <div class="modal fade" id="ModalProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Profil Pasien</h1>
          <a href="kartunama.php" target="_blank" title="Kartu Nama" class="text-lg"><i class="bi bi-person-vcard-fill"></i></a>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../controller/updatependaftaran.php" method="post">
            <input type="hidden" name="idpasien" value="<?= $dataPasien['idpasien'] ?>">

            <div class="input-group mb-2">
              <span class="input-group-text">Nama</span>
              <input type="text" class="form-control" name="nama" required value="<?= $dataPasien['nama'] ?>">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Tempat Lahir</span>
              <input type="text" class="form-control" name="tempatlahir" required value="<?= $dataPasien['tempatlahir'] ?>">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Tanggal Lahir</span>
              <input type="date" class="form-control" name="tanggallahir" required value="<?= $dataPasien['tanggallahir'] ?>">
            </div>


            <div class="input-group mb-2">
              <span class="input-group-text">Jenis Kelamin</span>

              <select name="jeniskelamin" class="form-select" required>
                <option value=""></option>
                <option value="Laki-Laki" <?php if ($dataPasien['jeniskelamin'] == 'Laki-Laki') echo 'selected' ?>>Laki-Laki</option>
                <option value="Perempuan" <?php if ($dataPasien['jeniskelamin'] == 'Perempuan') echo 'selected' ?>>Perempuan</option>
              </select>

            </div>
            <div class="input-group mb-2">
              <span class="input-group-text">Alamat</span>
              <input type="text" class="form-control" name="alamat" required value="<?= $dataPasien['alamat'] ?>">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Telepon</span>
              <input type="number" class="form-control" name="telepon" required value="<?= $dataPasien['telepon'] ?>">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Email</span>
              <input type="email" class="form-control" name="email" required value="<?= $dataPasien['email'] ?>">
            </div>

            <div class="input-group mb-2">
              <span class="input-group-text">Password</span>
              <input type="password" class="form-control" name="password" required value="<?= $dataPasien['password'] ?>">
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Ubah</button>
          </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../../template/js/script.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>