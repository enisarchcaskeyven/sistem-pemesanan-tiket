<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="login-page">

<div class="login-card">

    <div style="font-size:30px;margin-bottom:10px;">🎫</div>

    <h2 style="margin-bottom:5px;">Login</h2>

    <p style="font-size:12px;color:#777;margin-bottom:20px;">
        Sistem Pemesanan Tiket
    </p>

    <form action="../controller/login.php" method="POST">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control"
            placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control"
            placeholder="Masukkan password" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary"
        style="width:100%; margin-top:10px;">
            Masuk
        </button>

    </form>

    <p style="margin-top:15px;font-size:12px;">
        Belum punya akun?
        <a href="register.php" style="color:#5b6cff;font-weight:600;">
            Register
        </a>
    </p>

</div>

</body>
</html>