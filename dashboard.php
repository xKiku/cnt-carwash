<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Dashboard Karyawan</h1>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
    <nav>
        <ul>
            <li><a href="absen.php">Absen</a></li>
            <li><a href="view_absensi.php">Lihat Absensi</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <script src="js/script.js"></script>
</body>
</html>
