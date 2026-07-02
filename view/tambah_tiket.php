<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Tambah Tiket</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include "navbar.php"; ?>

<div class="topbar">
    <div>
        <h2>Tambah Tiket</h2>
        <p>Tambahkan data pemesanan baru</p>
    </div>
</div>

<div class="card">

<h3 class="card-title">Form Tiket</h3>

<!-- 🔥 PENTING: enctype WAJIB UNTUK UPLOAD GAMBAR -->
<form action="../controller/tiketcontroller.php" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label>Nama Pemesan</label>
    <input type="text" name="nama" class="form-control"
    placeholder="Masukkan nama pemesan" required>
</div>

<div class="form-group">
    <label>Tujuan</label>
    <input type="text" name="tujuan" class="form-control"
    placeholder="Masukkan tujuan" required>
</div>

<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
</div>

<div class="form-group">
    <label>Jumlah Tiket</label>
    <input type="number" name="jumlah" class="form-control"
    placeholder="Jumlah tiket" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control"
    placeholder="Harga tiket" required>
</div>

<!-- 🔥 UBAH INI JADI UPLOAD GAMBAR -->
<div class="form-group">
    <label>Bukti (Upload Foto)</label>
    <input type="file" name="bukti" class="form-control" required>
</div>

<button name="tambah" class="btn btn-primary">
    Simpan Data
</button>

<a href="data_tiket.php" class="btn btn-danger">
    Kembali
</a>

</form>

</div>

<?php include "footer.php"; ?>

</body>
</html>