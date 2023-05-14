<?php
$koneksi = mysqli_connect("localhost", "root", "", "rumahsakit");
if (mysqli_connect_errno()) {
  echo "Koneksi DB Gagal : " . mysqli_connect_error();
}
