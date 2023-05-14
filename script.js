const burger = document.querySelector("#burger");
const navLink = document.querySelector("nav ul");
burger.addEventListener("click", () => {
  navLink.classList.toggle("show");
});
