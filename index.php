<?php
session_start();
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];

        if ($role == 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($role == 'manajemen') {
            header("Location: manajemen/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Absensi Karyawan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="manajemen">Manajemen</option>
            <option value="user">Karyawan</option>
        </select>
        <button type="submit">Login</button>
    </form>
    <script src="js/script.js"></script>
</body>
</html>
