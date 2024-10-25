<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'manajemen') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajemen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Dashboard Manajemen</h1>
    <nav>
        <ul>
            <li><a href="laporan_absensi.php">Laporan Absensi Tim</a></li>
            <li><a href="kelola_tim.php">Kelola Tim</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <script src="js/script.js"></script>
</body>
</html>

