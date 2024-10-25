<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $karyawan_id = $_SESSION['user_id'];
    $tanggal = date('Y-m-d');
    $waktu_masuk = $_POST['waktu_masuk'];
    $waktu_keluar = $_POST['waktu_keluar'];

    $sql = "INSERT INTO absensi (karyawan_id, tanggal, waktu_masuk, waktu_keluar) VALUES ('$karyawan_id', '$tanggal', '$waktu_masuk', '$waktu_keluar')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Absensi berhasil!');</script>";
    } else {
        echo "<script>alert('Gagal melakukan absensi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Form Absensi Karyawan</h1>
    <form method="POST" onsubmit="return validateAbsensiForm();">
        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk" id="waktuMasuk" required>
        
        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" id="waktuKeluar">
        
        <button type="submit">Absen</button>
    </form>
    <script src="js/script.js"></script>
</body>
</html>
