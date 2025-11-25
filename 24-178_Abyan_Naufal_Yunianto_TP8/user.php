<?php

    session_start();
    if(!isset($_SESSION['login'])) {
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4F46E5;
            --primary2: #EC4899;
            --bg: #f3f4f6;
            --card: #ffffff;
            --border: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --btn-primary: #4F46E5;
            --btn-primary-hover: #4338CA;
            --btn-secondary: #e5e7eb;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at top, #e5e7eb, #f9fafb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 480px;
            background: var(--card);
            border-radius: 5px;
            overflow: hidden;
        }

        .card-header {
            height: 130px;
            background: linear-gradient(135deg, var(--primary), var(--primary2));
            position: relative;
        }

        .avatar-wrapper {
            position: absolute;
            left: 50%;
            bottom: -45px;
            transform: translateX(-50%);
            text-align: center;
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            overflow: hidden;
            background: #e5e7eb;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .change-text {
            margin-top: 6px;
            font-size: 11px;
            color: var(--text-muted);
        }

        .change-text label {
            cursor: pointer;
        }

        .change-text label:hover {
            text-decoration: underline;
        }

        .avatar-input {
            display: none;
        }

        .card-body {
            padding: 70px 26px 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 4px;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 9px 11px;
            border-radius: 3px;
            border: 1px solid var(--border);
            font-size: 13px;
            outline: none;
            transition: 0.2s;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 1px rgba(79, 70, 229, 0.15);
        }

        textarea {
            resize: none;
            min-height: 70px;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 9px 16px;
            border-radius: 3px;
            border: none;
            font-size: 13px;
            cursor: pointer;
            font-weight: 500;
            font-family: inherit;
        }

        .btn-secondary {
            background: var(--btn-secondary);
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-primary {
            background: var(--btn-primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--btn-primary-hover);
        }

        @media (max-width: 480px) {
            .card-body {
                padding: 70px 18px 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <div class="avatar-wrapper">
            <div class="avatar">
                <img src="https://i.pinimg.com/736x/7e/ae/b7/7eaeb79d51908e22995297c4130f9c05.jpg" alt="Foto Profil">
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="lovelance"
                        placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="Ada Lovelace"
                        placeholder="Masukkan nama lengkap">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nohp">No. Handphone</label>
                    <input
                        type="text"
                        id="nohp"
                        name="nohp"
                        value="081234567890"
                        placeholder="Masukkan nomor HP">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input
                    type="text"
                    id="alamat"
                    name="alamat"
                    value="Jakarta Selatan, Indonesia"
                    placeholder="Masukkan alamat lengkap">
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
