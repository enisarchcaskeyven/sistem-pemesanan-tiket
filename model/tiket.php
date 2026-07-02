<?php

require_once "../config/Database.php";

class Tiket {

    private $db;

    function __construct() {
        $database = new Database();
        $this->db = $database->koneksi();
    }

    function tampil() {
        return mysqli_query($this->db, "SELECT * FROM tiket");
    }

    function tambah($nama, $tujuan, $tanggal, $jumlah, $harga, $bukti) {

        $nama = mysqli_real_escape_string($this->db, $nama);
        $tujuan = mysqli_real_escape_string($this->db, $tujuan);
        $tanggal = mysqli_real_escape_string($this->db, $tanggal);
        $jumlah = mysqli_real_escape_string($this->db, $jumlah);
        $harga = mysqli_real_escape_string($this->db, $harga);
        $bukti = mysqli_real_escape_string($this->db, $bukti);

        return mysqli_query(
            $this->db,
            "INSERT INTO tiket 
            (nama_pemesan, tujuan, tanggal, jumlah, harga, bukti)
            VALUES 
            ('$nama', '$tujuan', '$tanggal', '$jumlah', '$harga', '$bukti')"
        );
    }

    function ambil($id) {
        $id = mysqli_real_escape_string($this->db, $id);

        $data = mysqli_query(
            $this->db,
            "SELECT * FROM tiket WHERE id='$id'"
        );

        return mysqli_fetch_assoc($data);
    }

    function update($id, $nama, $tujuan, $tanggal, $jumlah, $harga, $bukti) {

        $id = mysqli_real_escape_string($this->db, $id);

        return mysqli_query(
            $this->db,
            "UPDATE tiket SET 
            nama_pemesan='$nama',
            tujuan='$tujuan',
            tanggal='$tanggal',
            jumlah='$jumlah',
            harga='$harga',
            bukti='$bukti'
            WHERE id='$id'"
        );
    }

    function hapus($id) {
        return mysqli_query(
            $this->db,
            "DELETE FROM tiket WHERE id='$id'"
        );
    }

    function cari($keyword) {
        return mysqli_query(
            $this->db,
            "SELECT * FROM tiket
            WHERE nama_pemesan LIKE '%$keyword%'
            OR tujuan LIKE '%$keyword%'"
        );
    }
}