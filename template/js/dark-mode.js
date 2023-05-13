$(document).ready(function () {
  // cek apakah tema sebelumnya telah dipilih
  var theme = localStorage.getItem("theme");
  if (theme) {
    $("html").attr("data-bs-theme", theme);

    if (theme == "light") {
      $("#dropdownMenuButton").addClass("text-light");
    } else{
      $("#dropdownMenuButton").addClass("text-dark");
    }
  }
  // ubah tema ketika tombol diklik dan simpan tema ke localStorage
  $("#dark").click(function () {
    $("html").attr("data-bs-theme", "dark");
    localStorage.setItem("theme", "dark");
  });

  $("#light").click(function () {
    $("html").attr("data-bs-theme", "light");
    localStorage.setItem("theme", "light");
  });
});
