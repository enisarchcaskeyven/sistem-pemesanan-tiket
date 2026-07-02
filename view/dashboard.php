<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['nama']) && !isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

require_once "../model/Tiket.php";

$tiket = new Tiket();

$data = $tiket->tampil();

$total = 0;

if ($data) {
    $total = mysqli_num_rows($data);
}

$admin = $_SESSION['nama'] ?? $_SESSION['username'] ?? 'Administrator';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include "navbar.php"; ?>

<div class="topbar">
    <div>
        <h2>Dashboard Admin</h2>
        <p>Sistem Informasi Pemesanan Tiket</p>
    </div>
    <div class="date-box">
        <?= date("d F Y"); ?>
    </div>
</div>

<div class="card">
    <h3 class="card-title">Selamat Datang 👋</h3>
    <p>Halo, <strong><?= $admin; ?></strong></p>
</div>

<div class="dashboard-card">

    <a href="data_tiket.php" class="card-link">
        <div class="stat-card bg-blue">
            <h4>Total Tiket</h4>
            <h2><?= $total; ?></h2>
            <small>Lihat data tiket</small>
            <i>🎫</i>
        </div>
    </a>

    <a href="../laporan/laporan_tiket.php" target="_blank" class="card-link">
        <div class="stat-card bg-orange">
            <h4>Export PDF</h4>
            <h2>Download</h2>
            <small>Laporan PDF</small>
            <i>📄</i>
        </div>
    </a>

    <a href="../laporan/export_excel.php" class="card-link">
        <div class="stat-card bg-green">
            <h4>Export Excel</h4>
            <h2>Download</h2>
            <small>Laporan Excel</small>
            <i>📊</i>
        </div>
    </a>

    <a href="#" class="card-link">
        <div class="stat-card bg-purple">
            <h4>Administrator</h4>
            <h2><?= $admin; ?></h2>
            <small>Status login</small>
            <i>👤</i>
        </div>
    </a>

</div>

<?php include "footer.php"; ?>

</body>
</html>