  <input class="form-control" id="myInput" type="search" placeholder="Cari..">
  <br>
  <div class="table-responsive">
    <table class="table table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>No Medis</small></th>
          <th><small>Tanggal Pelayanan</small></th>
          <th><small>No Pasien</small></th>
          <th><small>Pasien</small></th>
          <th><small>Tempat Lahir</small></th>
          <th><small>Tanggal Lahir</small></th>
          <th><small>Jenis Kelamin</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;

        $email = $_SESSION['emailDokter'];
        $iddokter = query("SELECT idkaryawan FROM karyawan WHERE email = '$email'")[0]['idkaryawan'];
        $data = mysqli_query($koneksi, "SELECT rekammedis.idrekammedis,rekammedis.jenisperawatan,rekammedis.tanggalpelayanan, rekammedis.idpasien,pasien.nama, pasien.tempatlahir, pasien.tanggallahir,pasien.jeniskelamin FROM rekammedis,pasien,karyawan WHERE rekammedis.idpasien = pasien.idpasien AND rekammedis.idkaryawandokter = karyawan.idkaryawan AND rekammedis.idkaryawandokter = $iddokter ORDER BY rekammedis.tanggalpelayanan;");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr <?php
              if (is_null($d['jenisperawatan'])) {
                echo "class='bg-warning'";
              }
              ?>>
            <td><small><?php echo $no++; ?></small></td>
            <td><small><?php echo $d['idrekammedis']; ?></small></td>
            <td><small><?php echo tanggal($d['tanggalpelayanan']); ?></small></td>
            <td><small><?php echo $d['idpasien']; ?></small></td>
            <td><small><?php echo nama($d['nama']); ?></small></td>
            <td><small><?php echo $d['tempatlahir']; ?></small></td>
            <td><small><?php echo tanggal($d['tanggallahir']); ?></small></td>
            <td><small><?php echo $d['jeniskelamin']; ?></small></td>
            <td>
              <small>
                <a href="pemeriksaanlanjutan.php?q=<?= $d['idrekammedis'] ?>">Periksa</a>
              </small>
            </td>
          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>


  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>