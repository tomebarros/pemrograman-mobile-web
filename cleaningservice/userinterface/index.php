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
      <div class="col-sm-4 bg-light shadow mx-auto p-5 mt-5 border rounded-2">
        <h3>Login Cleaning Service</h3>
        <?php include "../../template/notifikasilogin.php"; ?>
        <form action="../controller/other/ceklogin.php" method="post">
          <div class="input-group mb-2">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="input-group mb-2">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <input type="submit" class="btn btn-primary" value="Login">
        </form>
      </div>
    </div>
  </div>

  <script src="../../template/js/login.js"></script>
</body>

</html>