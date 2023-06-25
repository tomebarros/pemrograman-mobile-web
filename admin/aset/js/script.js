// dark mode
const themeToggleBtn = document.querySelector("#theme");
const theme = localStorage.getItem("theme");

if (theme) {
  document.body.classList.add(theme);
  themeToggleBtn.classList.remove("fa-moon");
  themeToggleBtn.classList.add("fa-sun");
}

themeToggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark");
  if (document.body.classList.contains("dark")) {
    localStorage.setItem("theme", "dark");
    themeToggleBtn.classList.remove("fa-moon");
    themeToggleBtn.classList.add("fa-sun");
  } else {
    localStorage.removeItem("theme");
    themeToggleBtn.classList.remove("fa-sun");
    themeToggleBtn.classList.add("fa-moon");
  }
});

// navbar
const toggle = document.querySelector("#toggleNavbar");
const navbar = document.querySelector(".navbar");
toggle.addEventListener("click", function () {
  navbar.classList.toggle("show");
});

// navbar active
// mengambil lokasi dari file yang sedang diakses
var namaFile = window.location.pathname;
while (namaFile.endsWith("/")) {
  namaFile = namaFile.slice(0, -1);
}
// memotong string untuk mendapatkan nama file dengan ekstensi
var namaFileDenganEkstensi = namaFile.split("/").pop();
var namaFileTanpaEkstensi = namaFileDenganEkstensi.substring(0, namaFileDenganEkstensi.lastIndexOf("."));
var activeLinks = document.querySelectorAll(".active");
for (var i = 0; i < activeLinks.length; i++) {
  var link = activeLinks[i];
  var namaurl = link.href.split("/").pop().split(".")[0];
  var urlTerakhir = link.href.substring(link.href.lastIndexOf("/") + 1);
  var namaFileLink = urlTerakhir.split(".")[0];
  if (namaFileLink === namaFileTanpaEkstensi) {
    link.classList.add("active");
  } else {
    link.classList.remove("active");
  }
}

// modal profile
const modalProfile = document.querySelector("#modalProfile");
document.querySelector("#modalTargetProfile").addEventListener("click", function (e) {
  e.preventDefault();
  modalProfile.style.display = "block";
});

document.querySelector("#iconModalTutupProfile").addEventListener("click", () => {
  modalProfile.style.display = "none";
});

document.querySelector("#tutupModalProfile").addEventListener("click", () => {
  modalProfile.style.display = "none";
});
