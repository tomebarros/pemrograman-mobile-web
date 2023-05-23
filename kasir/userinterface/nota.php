<?php
include '../../template/functions.php';

$idrekammedis = input($_GET['q']);
$dataResep = query("SELECT pasien.nama,pasien.idpasien,rekammedis.idrekammedis, resep.jumlah, obat.namaobat, resep.hargasatuan, resep.hargasatuan * resep.jumlah AS total, rekammedis.idkaryawankasir FROM pasien,rekammedis,resep,obat WHERE rekammedis.idrekammedis = resep.idrekammedis AND resep.idobat = obat.idobat AND rekammedis.idpasien = pasien.idpasien AND rekammedis.idrekammedis = $idrekammedis;");
$namaPasien = $dataResep[0]['nama'];


$nama_berkas = "NotaPembayaran-"  .  $namaPasien . "_" . tanggal(date('Y-m-d'));
include("../../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetHeader('');
// $mpdf->SetMargins(0, 0, 10, 0); // Mengatur margin menjadi 0
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nota Pembayaran <?= $namaPasien; ?></title>

  <style>
    .nota .nota-body table tbody tr td {
      text-align: center;
    }

    .nota .nota-body table tbody tr td.rupiah {
      text-align: right;
    }

    .nota .nota-footer table tr td {
      text-align: center;
    }

    .nota .nota-footer table,
    .nota .nota-body table {
      margin-top: 2rem;
    }
  </style>
</head>

<body>
  <div class="nota">
    <div class="nota-header">
      <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td width="70%">
            <img src="../../template/img/logo.png" width="5rem" alt="">
            <p>JL. Perintis Kemerdekaan II</p>
            <p>Telp : 08121212122</p>
            <h2>TomeHealth</h2>
          </td>
          <td>
            <p>Tanggal : <?= tanggal(date('Y-m-d')); ?></p>
            <p>Kepada : <?= $namaPasien; ?></p>
          </td>
        </tr>
      </table>
    </div>
    <div class="nota-body">
      <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>Banyak Baran</th>
            <th>Nama Obat</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $gt = 0;
          foreach ($dataResep as $d) {
            $gt += $d['total'];
          ?>
            <tr>
              <td><?= $d['jumlah']; ?></td>
              <td><?= $d['namaobat']; ?></td>
              <td class="rupiah"><?= rupiah($d['hargasatuan']); ?></td>
              <td class="rupiah"><?= rupiah($d['total']); ?></td>
            </tr>
          <?php } ?>
          <tr>
            <td rowspan="2" colspan="3">Total</td>
            <td class="rupiah"><?= rupiah($gt); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="nota-footer">
      <table width="100%">
        <tr>
          <td>
            <p>Tanda Terima</p>
          </td>
          <td>
            <p>Hormat Kami,</p>
            <br><br><br><br>
            <p>(<?= getKaryawanById($dataResep[0]['idkaryawankasir']); ?>)</p>
          </td>
        </tr>
      </table>
    </div>
  </div>

</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_berkas . ".pdf", 'I');
exit;
?>