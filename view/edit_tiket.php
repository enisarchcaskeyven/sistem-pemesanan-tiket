<?php

require_once "../model/Tiket.php";

$tiket = new Tiket();

$data = null;

// VALIDASI ID
if (isset($_GET['id']) && $_GET['id'] != "") {
    $data = $tiket->ambil($_GET['id']);
}

// JIKA DATA TIDAK ADA
if (!$data) {
    echo "<script>
        alert('Data tidak ditemukan!');
        window.location='data_tiket.php';
    </script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Edit Tiket</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include "navbar.php"; ?>

<div class="topbar">
    <div>
        <h2>Edit Tiket</h2>
        <p>Perbarui data pemesanan</p>
    </div>
</div>

<div class="card">

<h3 class="card-title">Update Tiket</h3>

<form action="../controller/tiketcontroller.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $data['id']; ?>">
<input type="hidden" name="bukti_lama" value="<?= $data['bukti']; ?>">

<div class="form-group">
    <label>Nama Pemesan</label>
    <input type="text" name="nama" class="form-control"
    value="<?= $data['nama_pemesan']; ?>" required>
</div>

<div class="form-group">
    <label>Tujuan</label>
    <input type="text" name="tujuan" class="form-control"
    value="<?= $data['tujuan']; ?>" required>
</div>

<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control"
    value="<?= $data['tanggal']; ?>" required>
</div>

<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control"
    value="<?= $data['jumlah']; ?>" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control"
    value="<?= $data['harga']; ?>" required>
</div>

<!-- FOTO -->
<div class="form-group">
    <label>Bukti (Foto)</label><br>

    <img src="../assets/bukti/<?= $data['bukti']; ?>" width="80" style="border-radius:8px;"><br><br>

    <input type="file" name="bukti" class="form-control">
</div>

<button name="edit" class="btn btn-primary">
Update
</button>

<a href="data_tiket.php" class="btn btn-danger">
Kembali
</a>

</form>

</div>

<?php include "footer.php"; ?>

</body>
</html>