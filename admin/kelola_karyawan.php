<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

$absensi_result = $conn->query("SELECT a.id, k.nama, a.tanggal, a.waktu_masuk, a.waktu_keluar FROM absensi a JOIN karyawan k ON a.karyawan_id = k.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Absensi</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Kelola Absensi</h1>
    <h2>Daftar Absensi Karyawan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
        </tr>
        <?php while($row = $absensi_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['waktu_masuk']; ?></td>
                <td><?php echo $row['waktu_keluar']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="js/script.js"></script>
</body>
</html>
