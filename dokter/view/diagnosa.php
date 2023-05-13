<br>
<ol>
  <?php
  $datadetailpenyakit = query("SELECT detailpenyakit.iddetailpenyakit,penyakit.nama, penyakit.idpenyakit FROM penyakit,detailpenyakit WHERE penyakit.idpenyakit = detailpenyakit.idpenyakit AND detailpenyakit.idrekammedis = '$idrekammedis';");
  foreach ($datadetailpenyakit as $d) { ?>
    <li>
      <?= $d['nama']; ?> <a href="../controller/deletediagnosa.php?idrekammedis=<?= $idrekammedis ?>&iddetailpenyakit=<?= $d['iddetailpenyakit'] ?>"><i class="bi bi-x-circle text-danger"></i></a>
    </li>
  <?php } ?>
</ol>