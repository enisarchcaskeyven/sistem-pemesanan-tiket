<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<div class="sidebar">

    <div class="logo-area">

        <h2>🎫</h2>

        <h3>TIKETKU</h3>

        <p>Sistem Pemesanan Tiket</p>

    </div>


    <div class="sidebar-menu">


        <a href="dashboard.php">

            🏠 Dashboard

        </a>


        <a href="data_tiket.php">

            📋 Data Tiket

        </a>


        <a href="../laporan/laporan_tiket.php" target="_blank">

            📄 Laporan PDF

        </a>


        <a href="../controller/logout.php">

            🚪 Logout

        </a>


    </div>



    <div class="sidebar-user">


        <h4>
        <?= $_SESSION['username'] ?? 'Admin'; ?>
        </h4>


        <p>
        Administrator
        </p>


    </div>


</div>



<div class="main-content">