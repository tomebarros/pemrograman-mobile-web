<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Dokter</small></th>
        <th><small>Email</small></th>
        <th><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = query("SELECT dokterpoli.iddokterpoli, karyawan.nama as namadokter, karyawan.email FROM dokterpoli,karyawan WHERE dokterpoli.idkaryawan = karyawan.idkaryawan AND dokterpoli.idpoli = $q");
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?php echo $no++; ?></small></td>
          <td><small><?php echo $d['namadokter']; ?></small></td>
          <td><small><?php echo $d['email']; ?></small></td>
          <td>
            <small>
              <a href="../controller/delete/datadokterpoli.php?iddokterpoli=<?= $d['iddokterpoli']; ?>&q=<?= $q; ?>">Hapus</a>
            </small>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>