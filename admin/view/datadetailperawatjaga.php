  <br>
  <div class="table-responsive">
    <table class="table table-striped table-hover table-sm" id="myTable">
      <thead>
        <tr>
          <th><small>No</small></th>
          <th><small>Nama</small></th>
          <th><small>Email</small></th>
          <th><small>Telepon</small></th>
          <th><small>Aksi</small></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $idrawatinap = $_POST['idrawatinap'];
        $data = mysqli_query($koneksi, "SELECT detailperawatjaga.iddetailperawatjaga, karyawan.nama, karyawan.email, karyawan.telepon FROM karyawan,rawatinap,detailperawatjaga WHERE detailperawatjaga.idkaryawan = karyawan.idkaryawan AND detailperawatjaga.idrawatinap = rawatinap.idrawatinap AND rawatinap.idrawatinap = $idrawatinap");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><small><?php echo $no++; ?></small></td>
            <td><small><?php echo nama($d['nama']); ?></small></td>
            <td><small><?php echo $d['telepon']; ?></small></td>
            <td><small><?php echo email($d['email']); ?></small></td>
            <td>
              <small>
                <a href="../controller/delete/datadetailperawatjaga.php?q=<?= $d['iddetailperawatjaga']; ?>">Hapus</a>
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