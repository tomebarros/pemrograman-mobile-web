<br>
<ol>
  <?php
  $gt = 0;
  $datadetailpenyakit = query("SELECT resep.idresep, resep.idrekammedis, resep.idobat, obat.namaobat, obat.barcode, obat.satuan,obat.wujud, resep.dosis,resep.hargasatuan,resep.jumlah, resep.hargasatuan * resep.jumlah AS total FROM resep,obat WHERE resep.idobat = obat.idobat AND resep.idrekammedis = '$idrekammedis';");
  foreach ($datadetailpenyakit as $d) { ?>
    <li>
      <?= "{$d['namaobat']} | {$d['satuan']} | {$d['wujud']} | {$d['dosis']} | " . rupiah($d['hargasatuan']) . " x {$d['jumlah']} = " . rupiah($d['total']); ?> <a href="../controller/deleteresep.php?idrekammedis=<?= $idrekammedis ?>&idresep=<?= $d['idresep'] ?>"><i class="bi bi-x-circle text-danger"></i></a>
    </li>
  <?php
    $gt += $d['total'];
  } ?>
</ol>

<hr>
<?php

echo "Grand Total : " . rupiah($gt)  . "<br>";

echo "Terbilang " . ucwords(terbilang($gt)) . " Rupiah";

?>