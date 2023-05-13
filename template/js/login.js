$(document).ready(function () {
  const params = new URLSearchParams(window.location.search);
  const pesan = params.get("pesan");

  if (pesan === "gagal") {
    $('input[name="email"]').addClass("is-invalid");
    $('input[name="password"]').addClass("is-invalid");
  }
});

setTimeout(function () {
  history.replaceState({}, "", window.location.pathname);
}, 1500);

$('input[name="email"]').on("focus", function () {
  $('input[name="email"]').removeClass("is-invalid");
});

$('input[name="password"]').on("focus", function () {
  $('input[name="password"]').removeClass("is-invalid");
});
