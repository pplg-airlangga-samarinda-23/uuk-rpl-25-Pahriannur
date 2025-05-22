<?php
require "koneksi.php";
session_start();

// if (!isset($_SESSION['username'])) {
//     // header("location:login.php");
//     exit();
// }

$sql = "SELECT * FROM `data`";
$rows = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data.css">
    <title>Data Posyandu</title>
</head>

<body>
    <h1>Data Posyandu</h1>
    <!-- <h2>Selamat datang, <?= $_SESSION['username'] ?></h2> -->
    <a href="logout.php">Logout</a>
    <a href="tambah.php">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($item = mysqli_fetch_assoc($rows)) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($item["nama"]); ?></td>
                    <td><?= htmlspecialchars($item["umur"]); ?></td>
                    <td><?= htmlspecialchars($item["berat_badan"]); ?></td>
                    <td><?= htmlspecialchars($item["tinggi_badan"]); ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
