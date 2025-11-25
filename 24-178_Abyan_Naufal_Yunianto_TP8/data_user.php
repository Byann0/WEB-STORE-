<?php
session_start();
require 'koneksi.php';

// PROTEKSI HALAMAN: Hanya Level 1 (Owner) yang boleh akses
if(!isset($_SESSION['status']) || $_SESSION['level'] != 1){
    echo "<script>alert('Anda tidak memiliki akses!'); window.location='index.php';</script>";
    exit();
}

// PROSES TAMBAH / HAPUS SEDERHANA DALAM SATU FILE
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $lvl = $_POST['level'];
    mysqli_query($koneksi, "INSERT INTO user VALUES(NULL, '$username', '$password', '$nama', '$alamat', '$hp', '$lvl')");
    header("location:data_user.php");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
    header("location:data_user.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Data User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Master User</h2>
        <a href="index.php" class="btn-kembali" style="background:#555;">&laquo; Kembali ke Dashboard</a>
        <br><br>

        <form method="POST" style="margin-bottom:20px; border:1px solid #ccc; padding:15px;">
            <h3>Tambah User Baru</h3>
            <label>Username</label><input type="text" name="username" required>
            <label>Password</label><input type="text" name="password" required>
            <label>Nama Lengkap</label><input type="text" name="nama" required>
            <label>Alamat</label><input type="text" name="alamat" required>
            <label>No HP</label><input type="text" name="hp" required>
            <label>Level</label>
            <select name="level" required>
                <option value="1">Level 1 (Owner)</option>
                <option value="2">Level 2 (Kasir)</option>
            </select>
            <button type="submit" name="simpan">Simpan User</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM user");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo ($d['level']==1)?'Owner':'Kasir'; ?></td>
                    <td>
                        <a href="data_user.php?hapus=<?php echo $d['id_user']; ?>" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>