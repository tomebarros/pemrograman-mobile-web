// dark-mode
const themeToggleBtn = document.querySelector("#theme-toggle");
const theme = localStorage.getItem("theme");

if (theme) {
  document.body.classList.add(theme);
  themeToggleBtn.classList.remove("fa-moon");
  themeToggleBtn.classList.add("fa-sun");
}

themeToggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark");

  themeToggleBtn.classList.remove("fa-moon");
  themeToggleBtn.classList.add("fa-sun");

  if (document.body.classList.contains("dark")) {
    localStorage.setItem("theme", "dark");

    themeToggleBtn.classList.remove("fa-moon");
    themeToggleBtn.classList.add("fa-sun");
  } else {
    themeToggleBtn.classList.remove("fa-sun");
    themeToggleBtn.classList.add("fa-moon");
    localStorage.removeItem("theme");
  }
});

window.addEventListener("scroll", function () {
  var wn = window.pageYOffset || document.documentElement.scrollTop;
  if (wn > 10) {
    document.querySelector(".navbar").style.background = "rgba(0,0,0,0.6)";
    document.querySelector(".navbar").style.height = "4rem";
    document.querySelector(".navbar .logo").style.width = "4rem";
    document.querySelector(".navbar .logo").style.transition = ".3s";
  } else {
    document.querySelector(".navbar").style.background = "none";
    document.querySelector(".navbar").style.height = "6rem";
    document.querySelector(".navbar .logo").style.width = "5rem";
  }

  if (wn == 0) {
    // document.querySelector(".navbar-brand").style.fontSize = "32px";
  }
});

// cs scrolling
const cs = document.querySelector(".cs");
let isScrolling;
window.addEventListener("scroll", () => {
  // Hapus kelas "hidden" jika ada
  cs.classList.remove("hidden");

  // Hentikan timeout sebelumnya
  clearTimeout(isScrolling);

  // Setelah 200ms setelah scroll berhenti, tambahkan kelas "hidden"
  isScrolling = setTimeout(() => {
    cs.classList.add("hidden");
  }, 5000);
});

const burger = document.querySelector("#burger");
const navLink = document.querySelector("nav ul");
burger.addEventListener("click", () => {
  navLink.classList.toggle("show");
});
