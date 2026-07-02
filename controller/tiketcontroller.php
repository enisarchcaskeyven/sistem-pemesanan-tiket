<?php

require_once "../model/Tiket.php";

$tiket = new Tiket();

if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // UPLOAD GAMBAR
    $namaFile = $_FILES['bukti']['name'];
    $tmpFile  = $_FILES['bukti']['tmp_name'];

    $folder = "../assets/bukti/";

    if (!empty($namaFile)) {
        move_uploaded_file($tmpFile, $folder . $namaFile);
    } else {
        $namaFile = "";
    }

    $tiket->tambah($nama, $tujuan, $tanggal, $jumlah, $harga, $namaFile);

    echo "<script>
        alert('Data berhasil ditambah');
        window.location='../view/data_tiket.php';
    </script>";
}


// EDIT
if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // CEK GAMBAR BARU
    $namaFile = $_FILES['bukti']['name'];

    if ($namaFile != "") {

        $tmpFile = $_FILES['bukti']['tmp_name'];
        $folder = "../assets/bukti/";

        move_uploaded_file($tmpFile, $folder . $namaFile);

    } else {
        $namaFile = $_POST['bukti_lama'];
    }

    $tiket->update($id, $nama, $tujuan, $tanggal, $jumlah, $harga, $namaFile);

    echo "<script>
        alert('Data berhasil diupdate');
        window.location='../view/data_tiket.php';
    </script>";
}


// HAPUS
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    $tiket->hapus($id);

    echo "<script>
        alert('Data berhasil dihapus');
        window.location='../view/data_tiket.php';
    </script>";
}
?>