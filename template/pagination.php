<div class="paginations">

  <?php if ($halamanAktif > 1) { ?>
    <a href="?page=<?= $halamanAktif - 1; ?>"><i class="fa-solid fa-angle-left"></i></a>
  <?php } ?>


  <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
    <?php if ($i == $halamanAktif) { ?>
      <a href="?page=<?= $i; ?>#myTable" class="active"><?= $i; ?></a>
    <?php } else { ?>
      <a href="?page=<?= $i; ?>"><?= $i; ?></a>
    <?php } ?>
  <?php } ?>


  <?php if ($halamanAktif < $jumlahHalaman) { ?>
    <a href="?page=<?= $halamanAktif + 1 ?>"><i class="fa-solid fa-angle-right"></i></a>
  <?php } ?>




</div>