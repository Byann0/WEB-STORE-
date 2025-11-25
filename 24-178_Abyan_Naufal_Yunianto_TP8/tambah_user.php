<?php
session_start();
require_once 'koneksi.php';

// Hanya Owner
if (!isset($_SESSION['status']) || $_SESSION['level'] != 1) {
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    $stmt = $conn->prepare("INSERT INTO user (username, password, nama, alamat, hp, level) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $username, $password, $nama, $alamat, $hp, $level);

    if ($stmt->execute()) {
        header("Location: data_user.php"); // Kembali ke Data User
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah User Baru</h2>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"></textarea>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="hp">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" required>
                    <option value="1">Owner (1)</option>
                    <option value="2">Kasir (2)</option>
                </select>
            </div>
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="data_user.php" class="btn-batal">Batal</a>
        </form>
    </div>
</body>
</html>