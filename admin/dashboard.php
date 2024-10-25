<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Selamat Datang, Admin <?php echo $_SESSION['username']; ?>!</p>
    <nav>
        <ul>
            <li><a href="kelola_karyawan.php">Kelola Karyawan</a></li>
            <li><a href="kelola_absensi.php">Kelola Absensi</a></li>
            <li><a href="laporan_absensi.php">Laporan Absensi</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    <script src="js/script.js"></script>
</body>
</html>
