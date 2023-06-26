// dark mode
const theme = localStorage.getItem("theme");

theme && document.body.classList.add(theme);

// const themeToggleBtn = document.querySelector("#theme");
// themeToggleBtn.addEventListener("click", () => {
//   document.body.classList.toggle("dark");
//   if (document.body.classList.contains("dark")) {
//     localStorage.setItem("theme", "dark");
//     themeToggleBtn.classList.remove("fa-moon");
//     themeToggleBtn.classList.add("fa-sun");
//   } else {
//     localStorage.removeItem("theme");
//     themeToggleBtn.classList.remove("fa-sun");
//     themeToggleBtn.classList.add("fa-moon");
//   }
// });
