window.addEventListener("scroll", function () {
  var wn = window.pageYOffset || document.documentElement.scrollTop;
  if (wn > 10) {
    document.querySelector(".navbar").style.background = "rgba(0,0,0,0.6)";
    document.querySelector(".navbar").style.height = "4rem";
    document.querySelector(".navbar .logo").style.width = "4rem";
    document.querySelector(".navbar .logo").style.transition = ".3s";
    // document.querySelector(".navbar-brand").style.fontSize = "30px";
  } else {
    document.querySelector(".navbar").style.background = "none";
    document.querySelector(".navbar").style.height = "6rem";
    document.querySelector(".navbar .logo").style.width = "5rem";
  }

  if (wn == 0) {
    // document.querySelector(".navbar-brand").style.fontSize = "32px";
  }
});

// var navbarToggler = document.querySelector(".navbar-toggler");
// navbarToggler.addEventListener("click", function () {
//   document.querySelector(".navbar").style.background = "rgba(0,0,0,0.6)";
// });

const burger = document.querySelector("#burger");
const navLink = document.querySelector("nav ul");
burger.addEventListener("click", () => {
  navLink.classList.toggle("show");
});

// dark-mode
const themeToggleBtn = document.querySelector("#theme-toggle");
const theme = localStorage.getItem("theme");

if (theme) {
  document.body.classList.add(theme);
  themeToggleBtn.classList.remove("fa-moon");
  themeToggleBtn.classList.add("fa-sun");
}

themeToggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  themeToggleBtn.classList.remove("fa-moon");
  themeToggleBtn.classList.add("fa-sun");

  if (document.body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark-mode");

    themeToggleBtn.classList.remove("fa-moon");
    themeToggleBtn.classList.add("fa-sun");
  } else {
    themeToggleBtn.classList.remove("fa-sun");
    themeToggleBtn.classList.add("fa-moon");
    localStorage.removeItem("theme");
  }
});
