// Fungsi untuk mengirim data ke server menggunakan AJAX
function sendData() {
  // Buat objek XMLHttpRequest
  var xhr = createXHR();

  // Callback function yang akan dipanggil ketika readyState berubah
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Response dari server
      var response = xhr.responseText;
      console.log(response); // Tampilkan response dari server
      document.getElementById("contactForm").reset(); // Reset form setelah data terkirim
    }
  };

  // Mendefinisikan request AJAX
  xhr.open("POST", "insertpesan.php", true);

  // Set header jika diperlukan
  // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Data yang akan dikirim ke server
  var nama = encodeURIComponent(document.getElementById("nama").value);
  var email = encodeURIComponent(document.getElementById("email").value);
  var pesan = encodeURIComponent(document.getElementById("pesan").value);

  var data = "nama=" + nama + "&email=" + email + "&pesan=" + pesan;

  // Kirim request ke server
  xhr.send(data);
}
