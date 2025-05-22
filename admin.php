<?php
require "koneksi.php";

$sql = "SELECT * FROM admin"; // Assuming you want to fetch from kader_data
$rows = $koneksi->execute_query($sql, []);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/9644a59faa.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1 style="position:relative; top: 10px;">POSYANDU</h1>
    </header>
    <article>
        <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 30px;">DATA KADER</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Edit/Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows->num_rows > 0) {
                    $no = 1;
                    while ($admin = $rows->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= htmlspecialchars($admin["username"]); ?></td> <!-- Assuming 'name' is the correct field -->
                    <td>
                        <a href="edit.php?id=<?= $admin['id'] ?>" class="fa-solid fa-pen" style="margin-left: 10px;"></a>
                        <a href="hapus.php?id=<?= $admin['id'] ?>" class="fa-solid fa-trash" style="margin-left: 27px;"></a>
                    </td>
                </tr>
                <?php
                    $no += 1;
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align:center;'>Tidak ada data kader.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <footer>
            <h1 class="profil">Hi, Admin!</h1>
            <div class="tam-log">
                <a href="tambah.php">Tambah Kader</a>
                <a href="logout.php">Log out</a>
            </div>
        </footer>
    </article>
</body>
</html>
