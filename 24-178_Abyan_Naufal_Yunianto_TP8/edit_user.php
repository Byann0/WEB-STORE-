<?php
session_start();
require_once 'koneksi.php';

// Hanya Owner
if (!isset($_SESSION['status']) || $_SESSION['level'] != 1) {
    header("location: index.php");
    exit;
}

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM user WHERE id_user='$id'")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];
    
    // Update Password jika diisi
    if(!empty($_POST['password'])){
        $pass = md5($_POST['password']);
        $sql = "UPDATE user SET nama='$nama', alamat='$alamat', hp='$hp', level='$level', password='$pass' WHERE id_user='$id'";
    } else {
        $sql = "UPDATE user SET nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user='$id'";
    }

    if ($conn->query($sql)) {
        header("Location: data_user.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="post">
            <div class="form-group">
                <label>Username (Tidak bisa diubah)</label>
                <input type="text" value="<?php echo $row['username']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Password (Isi jika ingin mengubah)</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"><?php echo $row['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="hp" value="<?php echo $row['hp']; ?>">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level">
                    <option value="1" <?php if($row['level']==1) echo 'selected'; ?>>Owner</option>
                    <option value="2" <?php if($row['level']==2) echo 'selected'; ?>>Kasir</option>
                </select>
            </div>
            <button type="submit" class="btn-simpan">Update</button>
            <a href="data_user.php" class="btn-batal">Batal</a>
        </form>
    </div>
</body>
</html>