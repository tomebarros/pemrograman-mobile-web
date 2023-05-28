<?php
include "../../template/functions.php";
include "../controller/other/restrict.php";

$idpesan = input($_GET['q']);
$query = "SELECT * FROM pesan WHERE idpesan = '$idpesan'";
$cek = getData($query);
if ($cek < 1) {
  echo "<a href='pesan.php'>Kembali </a>";
  die('Pesan Tidak Tersedia');
}
$dataPesan = query($query)[0];
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <title>Isi Pesan | <?= $dataPesan['nama']; ?></title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbar.php"; ?>

  <div class="container">
    <div class="row mx-1">
      <div class="col-md-6 border p-3 mt-1">
        <h3>Nomor Pesan <?= $idpesan; ?></h3>
        <ul>
          <li>Nama : <?= $dataPesan['nama']; ?></li>
          <li>Email : <?= $dataPesan['email']; ?></li>
          <li>Judul : <?= $dataPesan['judul']; ?></li>
          <li>Tanggal : <?= tanggal($dataPesan['tanggal']); ?></li>
          <li>Status : <?= is_null($dataPesan['status']) ? '<span class="text-warning">Belum Baca Pesan Ini</span>' : 'Sudah Baca'; ?></li>
          <li>Keteranggan : <?= is_null($dataPesan['keterangan']) ? '<span class="text-warning">Belum Balas</span>' : 'Sudah Balas' ?></li>
        </ul>
        <h4><?= $dataPesan['judul']; ?></h4>
        <p><?= $dataPesan['isipesan']; ?></p>
        <?php if (!is_null($dataPesan['keterangan'])) { ?>
          <hr>
          <p><?= $dataPesan['balasan']; ?></p>
        <?php } ?>
      </div>

      <div class="col-md-6 mt-2">
        <form action="../controller/pesan/balaspesan.php" method="POST" onsubmit="return confirm('Balas Pesan Ini?')">
          <input type="hidden" name="idpesan" value="<?= $idpesan; ?>">
          <input type="hidden" value="<?= $dataPesan['idpesan'] ?>">
          <div class="form-floating">
            <textarea class="form-control" required name="pesan" placeholder="Leave a comment here" id="floatingTextarea2" style="min-height: 300px;max-height: 300px;"></textarea>
            <label for="floatingTextarea2">Balas Pesan</label>
          </div>
          <div class="d-grid mt-2">
            <button class="btn btn-success">Kirim</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  <script src="../../template/js/dark-mode.js"></script>
  <script src="../../template/js/script.js"></script>
</body>

</html>
<?php
if (is_null($dataPesan['status'])) {
  mysqli_query($koneksi, "UPDATE pesan SET status = '1' WHERE idpesan = '$idpesan'");

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Required variables
  $FROMEMAIL  = '"TomeHealth" <cs@21120055rekammedis.my.id>';
  $TOEMAIL    = $dataPesan['email'];
  $SUBJECT    = "Status Pesan Dari CS TomeHealth";
  $PLAINTEXT  = "Kami Harap Anda Tidak Membalas Email Ini";
  $RANDOMHASH = "anyrandomhash";
  $FICTIONALSERVER = "@21120055lrekammedis.my.id";

  // Basic headers
  $headers = "From: " . $FROMEMAIL . "\n";
  $headers .= "Reply-To: " . $FROMEMAIL . "\n";
  $headers .= "Return-path: " . $FROMEMAIL . "\n";
  $headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";
  $headers .= "Kepada  {$dataPesan['nama']}, \n \n";
  $headers .= "Pesan Anda yang judul '{$dataPesan['judul']}' telah dibaca oleh TIM 21120055rekammedis.my.id . \n";
  $headers .= "Status Pesan : Dibaca. \n \n";

  $headers .= "Salam Hangat. \n";
  $headers .= "Tim 21120055rekammedis.my.id. \n";

  // Convert plain text body to quoted printable
  $message = quoted_printable_encode($PLAINTEXT);

  // Create a BASE64 encoded subject
  $subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

  // Send email
  mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);
}
?>