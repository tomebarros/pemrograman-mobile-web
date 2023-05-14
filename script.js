const burger = document.querySelector("#burger");
const navLink = document.querySelector("nav ul");
burger.addEventListener("click", () => {
  navLink.classList.toggle("show");
});

// dark-mode
const themeToggleBtn = document.querySelector("#theme-toggle");
const theme = localStorage.getItem("theme");

theme && document.body.classList.add(theme);

themeToggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark-mode");
  } else {
    localStorage.removeItem("theme");
  }
});
