<?php 
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];
    

    $sql = "INSERT INTO data (nama, umur, berat_badan, tinggi_badan) values (?, ?, ?, ?)";
    
    // PHP 8.2
    $row = $koneksi->execute_query($sql, [$nama, $umur, $berat_badan, $tinggi_badan]);

    // untuk semua versi PHP
    // $stmt = $koneksi->prepare($sql);
    // $stmt->bind_param("sis", $nama, $stok, $status);
    // $stmt->execute();

    header("Location: data.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Posyandu Form - With location.href</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .input-field {
      border: 1px solid #d1d5db;
      border-radius: 0.375rem; /* rounded */
      width: 100%;
      padding: 0.5rem 0.75rem;
      margin-bottom: 1rem;
    }
    .button-submit {
      background-color: #6b21a8; /* purple-700 */
      color: white;
      border-radius: 9999px;
      padding: 0.5rem 2rem;
      font-size: 0.875rem;
      font-weight: 400;
      cursor: pointer;
      border: none;
    }
  </style>
</head>
<body class="bg-gray-200 flex justify-center items-start min-h-screen pt-10">
  <div class="bg-white w-72 shadow-md">
    <div class="bg-purple-700 text-white text-center py-3 text-lg font-normal">
      Posyandu
    </div>
    <form action="" method="post">
      <div class="p-6 text-black font-normal">
        <label class="block mb-1" for="nama">Nama :</label>
        <input id="nama" type="text" class="input-field" name="nama" required />

        <label class="block mb-1" for="umur">Umur :</label>
        <input id="umur" type="number" class="input-field" name="umur" required />

        <label class="block mb-1" for="tinggi_badan">Tinggi Badan (cm):</label>
        <input id="tinggi_badan" type="number" class="input-field" name="tinggi_badan" required />

        <label class="block mb-6" for="berat_badan">Berat Badan (kg):</label>
        <input id="berat_badan" type="number" class="input-field" name="berat_badan" required />

        <div class="flex justify-center">
          <button class="button-submit" onclick="submitForm()">Kirim</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    function submitForm() {
      // Get input values
      const nama = document.getElementById('nama').value.trim();
      const umur = document.getElementById('umur').value.trim();
      const tinggi = document.getElementById('tinggi_badan').value.trim();
      const berat = document.getElementById('berat_badan').value.trim();

      // Basic validation
      if (!nama || !umur || !tinggi || !berat) {
        alert('Silakan isi semua field!');
        return;
      }

      // Encode parameters
      const params = new URLSearchParams({
        nama: nama,
        umur: umur,
        tinggi_badan: tinggi,
        berat_badan: berat
      });

      // Redirect to data.php with query parameters
      window.location.href = 'data.php?' + params.toString();
    }
  </script>
</body>
</html>

