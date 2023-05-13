<input class="form-control" id="myInput" type="search" placeholder="Cari..">
<br>
<div class="table-responsive">
  <table class="table table-striped table-hover table-sm" id="myTable">
    <thead>
      <tr>
        <th><small>No</small></th>
        <th><small>Keahlian Dokter</small></th>
        <th><small>Aksi</small></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = query("SELECT keahliandokter.nama, karyawan.idkaryawan FROM karyawan,keahliandokter,detailkeahliandokter WHERE detailkeahliandokter.idkaryawan = karyawan.idkaryawan AND detailkeahliandokter.idkeahliandokter = keahliandokter.idkeahliandokter AND karyawan.idkaryawan = $q");
      foreach ($data as $d) {
      ?>
        <tr>
          <td><small><?= $no++; ?></small></td>
          <td><small><?= $d['nama']; ?></small></td>
          <td>
            <small>
              <a href="#">Ubah</a>
              <a href="#">Hapus</a>
            </small>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>