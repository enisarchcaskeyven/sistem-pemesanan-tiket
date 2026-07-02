<?php
require_once "../config/Database.php";

$database = new Database();
$conn = $database->koneksi();

header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_tiket.xls");

$data = mysqli_query($conn, "SELECT * FROM tiket");
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Pemesan</th>
        <th>Tujuan</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Harga</th>
    </tr>

    <?php
    $no = 1;
    while($d = mysqli_fetch_assoc($data)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['nama_pemesan']; ?></td>
        <td><?= $d['tujuan']; ?></td>
        <td><?= $d['tanggal']; ?></td>
        <td><?= $d['jumlah']; ?></td>
        <td><?= $d['harga']; ?></td>
    </tr>
    <?php } ?>
</table>