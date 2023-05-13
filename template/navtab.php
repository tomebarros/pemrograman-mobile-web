<nav>
  <ul class="pagination pagination-sm mt-2 justify-content-end pb-5 mb-5">
    <?php if ($halamanAktif > 1) { ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>#myTable"><i class="bi bi-chevron-double-left"></i></a>
      </li>
    <?php } else { ?>
      <li class="page-item">
        <button class="page-link disabled"><i class="bi bi-chevron-double-left"></i></button>
      </li>
    <?php } ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
      <?php if ($i == $halamanAktif) { ?>
        <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>#myTable"><?= $i; ?></a></li>
      <?php } else { ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>#myTable"><?= $i; ?></a></li>
      <?php } ?>
    <?php } ?>

    <?php if ($halamanAktif < $jumlahHalaman) { ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $halamanAktif + 1 ?>#myTable"><i class="bi bi-chevron-double-right"></i></a>
      </li>
    <?php } else { ?>
      <li class="page-item">
        <a class="page-link disabled"><i class="bi bi-chevron-double-right"></i></a>
      </li>
    <?php } ?>
  </ul>
</nav>