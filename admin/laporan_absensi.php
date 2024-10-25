<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

$laporan_result = $conn->query("SELECT k.nama, COUNT(a.id) AS total_absensi FROM absensi a JOIN karyawan k ON a.karyawan_id = k.id GROUP BY k.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Laporan Absensi Karyawan</h1>
    <table>
        <tr>
            <th>Nama Karyawan</th>
            <th>Total Absensi</th>
        </tr>
        <?php while($row = $laporan_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['total_absensi']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="js/script.js"></script>
</body>
</html>
