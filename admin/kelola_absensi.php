<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $sql = "INSERT INTO karyawan (nama, jabatan) VALUES ('$nama', '$jabatan')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Karyawan berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan karyawan!');</script>";
    }
}

$karyawan_result = $conn->query("SELECT * FROM karyawan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Karyawan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Kelola Karyawan</h1>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Karyawan" required>
        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <button type="submit">Tambahkan Karyawan</button>
    </form>

    <h2>Daftar Karyawan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
        </tr>
        <?php while($row = $karyawan_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jabatan']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="js/script.js"></script>
</body>
</html>
