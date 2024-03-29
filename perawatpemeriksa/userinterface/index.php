<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <?php include "../../template/cdnbs5.php"; ?>
</head>

<body>

  <?php include "../aset/navbarlogin.php"; ?>

  <div class="container">

    <div class="row mx-2">
      <div class="col-md-6 col-lg-4  shadow mx-auto p-5 mt-5 border rounded-2">
        <h3>Login Perawat Pemeriksa</h3>
        <?php include "../../template/notifikasilogin.php"; ?>
        <form action="../controller/other/ceklogin.php" method="post">
          <div class="input-group mb-2">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="input-group mb-2">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="../../" class="btn btn-info text-light">Home</a>
          </div>
        </form>
      </div>
    </div>

  </div>

  <script src="../../template/js/login.js"></script>
  <script src="../../template/js/dark-mode.js"></script>
</body>

</html>