<?php 
require "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM admin WHERE id = ?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();

    // Check if the record exists
    if (!$row) {
        header("location:data.php");
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); // Get the ID from the POST request
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];

    // Update query
    $sql = "UPDATE admin SET nama=?, umur=?, berat_badan=?, tinggi_badan=? WHERE id=?";
    $koneksi->execute_query($sql, [$nama, $umur, $berat_badan, $tinggi_badan, $id]); // Include $id in the query
    header("location:data.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu PPLG</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU PPLG</h1>
    </header>
    <article>
        <h1>EDIT DATA KADER</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>"> <!-- Hidden field for ID -->
            <div class="p-6 text-black font-normal">
                <label class="block mb-1" for="nama">Nama :</label>
                <input id="nama" type="text" class="input-field" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required />

                <label class="block mb-1" for="umur">Umur :</label>
                <input id="umur" type="number" class="input-field" name="umur" value="<?= htmlspecialchars($row['umur']) ?>" required />

                <label class="block mb-1" for="tinggi_badan">Tinggi Badan (cm):</label>
                <input id="tinggi_badan" type="number" class="input-field" name="tinggi_badan" value="<?= htmlspecialchars($row['tinggi_badan']) ?>" required />

                <label class="block mb-6" for="berat_badan">Berat Badan (kg):</label>
                <input id="berat_badan" type="number" class="input-field" name="berat_badan" value="<?= htmlspecialchars($row['berat_badan']) ?>" required />

                <div class="flex justify-center">
                    <button type="submit" class="button-submit">Kirim</button>
                </div>
            </div>
        </form>
        <footer>
            <h1 class="profil">Hi, <?= htmlspecialchars($_SESSION['nama']) ?>!</h1>
            <div class="tam-log">
                <a href="data.php">Kembali</a>
            </div>
        </footer>
    </article>
</body>
</html>
