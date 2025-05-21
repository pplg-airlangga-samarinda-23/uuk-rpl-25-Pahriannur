<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $query = "SELECT * FROM `admin` WHERE username = '$username' AND `password` = '$password' AND `role` = '$role'";
    $result = mysqli_query($koneksi, $query); 

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("location:admin.php");
            exit(); 
        } else {
            header("Location: kader.php");
            exit(); 
        }
    } else {
        echo "<p>silakann</p>"; 
    }
}
?>
  <div class="container">
    <div class="avatar"></div>
    <form method="POST" action="">
        <div class="input-group">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </div>
        <div class="input-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="kader">Kader</option>
            </select>
        </div>
        <div class="button-group">
            <button type="submit">Login</button>
        </div>
    </form>
  </div>
</body>
</html>
