<?php
include '../../template/functions.php';
include '../controller/other/restrict.php';
$emailPasien = $_SESSION['emailPasien'];
$dataPasien = query("SELECT * FROM pasien WHERE email = '$emailPasien'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Nama <?= $dataPasien['nama']; ?></title>
  <link rel="stylesheet" href="css/kartunama.css">

  <!-- link download file foto -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>

</head>

<body>
  <div class="container">
    <div class="card" id="card">
      <div class="card-header">
        <img src="../../img/logo.png" alt="Logo">
        <div class="text-header">
          <h3>TomeHealth</h3>
          <p>JL. Perintis Kemerdekaan II, Telp. 0821-9999-9999</p>
          <p>Email : cs@21120055rekammedis.my.id</p>
        </div>
      </div>

      <div class="card-body">
        <div class="left">
          <p>Nama</p>
          <p>Tempat Lahir</p>
          <p>Tanggal Lahir</p>
          <p>Jenis Kelamin</p>
          <p>Alamat</p>
          <p>No Hp</p>
          <p>Email</p>
        </div>
        <div class="right">
          <p>: <?= $dataPasien['nama']; ?></p>
          <p>: <?= $dataPasien['tempatlahir']; ?></p>
          <p>: <?= tanggal($dataPasien['tanggallahir']); ?></p>
          <p>: <?= $dataPasien['jeniskelamin']; ?></p>
          <p>: <?= $dataPasien['alamat']; ?></p>
          <p>: <?= $dataPasien['telepon']; ?></p>
          <p>: <?= $dataPasien['email']; ?></p>
        </div>
      </div>

    </div>
    <button type="button" id="download">Download</button>
  </div>




  <script>
    let time = new Date();
    let timeNow;
    timeNow = time.getHours() + "-" + time.getMinutes() + "-" + time.getSeconds();

    jQuery(document).ready(function() {
      jQuery("#download").click(function() {
        screenshot();
      });
    });

    function screenshot() {
      html2canvas(document.getElementById("card")).then(function(canvas) {
        downloadImage(canvas.toDataURL(), "KartuPelanggan_<?= str_replace(' ', '', $dataPasien['nama']); ?>_" + timeNow + ".png");
      });
    }

    function downloadImage(uri, filename) {
      var link = document.createElement('a');
      if (typeof link.download !== 'string') {
        window.open(uri);
      } else {
        link.href = uri;
        link.download = filename;
        accountForFirefox(clickLink, link);
      }
    }

    function clickLink(link) {
      link.click();
    }

    function accountForFirefox(click) {
      var link = arguments[1];
      document.body.appendChild(link);
      click(link);
      document.body.removeChild(link);
    }
  </script>


</body>

</html>