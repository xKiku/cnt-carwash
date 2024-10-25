<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit();
}

$karyawan_id = $_SESSION['user_id'];
$absensi_result = $conn->query("SELECT * FROM absensi WHERE karyawan_id = '$karyawan_id'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Riwayat Absensi</h1>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
        </tr>
        <?php while($row = $absensi_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['waktu_masuk']; ?></td>
                <td><?php echo $row['waktu_keluar']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="js/script.js"></script>
</body>
</html>

