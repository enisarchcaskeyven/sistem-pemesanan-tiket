<?php

require_once "../model/Tiket.php";

$tiket = new Tiket();

if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $data = $tiket->cari($_GET['keyword']);
} else {
    $data = $tiket->tampil();
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>Data Tiket</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include "navbar.php"; ?>

<div class="topbar">
    <div>
        <h2>Data Tiket</h2>
        <p>Kelola semua data pemesanan tiket</p>
    </div>
</div>

<div class="card">

<h3 class="card-title">Data Pemesanan</h3>

<!-- BUTTON -->
<div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:15px;">

    <a href="../laporan/laporan_tiket.php" target="_blank" class="btn btn-primary">
        📄 Export PDF
    </a>

    <a href="../laporan/export_excel.php" class="btn btn-success">
        📊 Export Excel
    </a>

    <a href="tambah_tiket.php" class="btn btn-primary">
        + Tambah Tiket
    </a>

</div>

<!-- SEARCH -->
<form method="GET" class="search-box">

    <input 
        type="text"
        name="keyword"
        placeholder="Cari nama pemesan atau tujuan">

    <button class="btn btn-primary">Cari</button>

</form>

<!-- TABLE -->
<table>

<thead>
<tr>
    <th>No</th>
    <th>Nama Pemesan</th>
    <th>Tujuan</th>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Bukti</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no = 1; while ($d = mysqli_fetch_assoc($data)) { ?>

<tr>

<td><?= $no++; ?></td>
<td><?= $d['nama_pemesan']; ?></td>
<td><?= $d['tujuan']; ?></td>
<td><?= $d['tanggal']; ?></td>
<td><?= $d['jumlah']; ?></td>
<td>Rp <?= number_format($d['harga']); ?></td>

<!-- 🔥 INI BAGIAN GAMBAR -->
<td>
    <?php if (!empty($d['bukti'])) { ?>
        <img src="../assets/bukti/<?= $d['bukti']; ?>" 
             width="60" 
             height="60"
             style="object-fit:cover;border-radius:8px;">
    <?php } else { ?>
        <span style="color:red;">No Image</span>
    <?php } ?>
</td>

<td>

<a href="edit_tiket.php?id=<?= $d['id']; ?>" class="btn btn-primary">
Edit
</a>

<a href="../controller/tiketcontroller.php?hapus=<?= $d['id']; ?>"
class="btn btn-danger"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "footer.php"; ?>

</body>
</html>