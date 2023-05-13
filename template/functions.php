<?php
$koneksi = mysqli_connect("localhost", "root", "", "rumahsakit");
if (mysqli_connect_errno()) {
  echo "Koneksi DB Gagal : " . mysqli_connect_error();
}

// query
function query($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function getData($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  return mysqli_num_rows($result);
}

function getKaryawanById($idkaryawan)
{
  $data = query("SELECT nama FROM karyawan WHERE idkaryawan = '$idkaryawan'")[0]['nama'];
  return $data;
}

function input($data)
{
  $sting_replace = array('\'', ';', '[', ']', '{', '}', '|', '~', '<', '>', '+', '&', '#', '!');
  $data = str_replace($sting_replace, '', $data);
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function filter($string)
{
  $string = str_replace("'", "", $string);
  $string = preg_replace('~[\;<>{"}]~', '', $string);
  return $string;
}


function namakaryawan($email)
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE email = '$email'");
  while ($data = mysqli_fetch_assoc($result)) {
    return $data['nama'];
  }
}


function namapasien($email)
{
  global $koneksi;
  $result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE email = '$email'");
  while ($data = mysqli_fetch_assoc($result)) {
    return $data['nama'];
  }
}

function nama($nama)
{
  return ucwords(strtolower($nama));
}

function tanggal($tanggal)
{
  if (is_null($tanggal) or $tanggal == '0000-00-00') {
    return '-';
  } else {
    return date('d M Y', strtotime($tanggal));
  }
}

function email($email)
{
  return strtolower($email);
}

function rupiah($nilai)
{
  return 'Rp. ' . number_format($nilai, 0, ',', '.');
}

function penyebut($nilai)
{
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " " . $huruf[$nilai];
  } else if ($nilai < 20) {
    $temp = penyebut($nilai - 10) . " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
  }
  return $temp;
}

function terbilang($nilai)
{
  if ($nilai < 0) {
    $hasil = "minus " . trim(penyebut($nilai));
  } else {
    $hasil = trim(penyebut($nilai));
  }
  return $hasil;
}
