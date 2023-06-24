// mengambil lokasi dari file yang sedang diakses
var namaFile = window.location.pathname;

// hapus karakter / di akhir string jika ada
while (namaFile.endsWith("/")) {
  namaFile = namaFile.slice(0, -1);
}

// memotong string untuk mendapatkan nama file dengan ekstensi
var namaFileDenganEkstensi = namaFile.split("/").pop();

// memotong string untuk mendapatkan nama file tanpa ekstensi
var namaFileTanpaEkstensi = namaFileDenganEkstensi.substring(0, namaFileDenganEkstensi.lastIndexOf("."));

// Dapatkan semua elemen link dengan class "active"
var activeLinks = document.querySelectorAll(".active");

// Loop melalui semua elemen link dengan class "active"
for (var i = 0; i < activeLinks.length; i++) {
  var link = activeLinks[i];

  // memotong string untuk mendapatkan nama file tanpa ekstensi dari URL link
  console.log(namaFile);

  var namaurl = link.href.split("/").pop().split(".")[0];

  var urlTerakhir = link.href.substring(link.href.lastIndexOf("/") + 1);
  var namaFileLink = urlTerakhir.split(".")[0];

  // Periksa apakah nilai href-nya sama dengan nilai title
  if (namaFileLink === namaFileTanpaEkstensi) {
    // console.log(namaFileLink);
    // Jika ya, berikan kelas "active"
    link.classList.add("active");
  } else {
    // Jika tidak, hapus kelas "active"
    link.classList.remove("active");
  }
}
