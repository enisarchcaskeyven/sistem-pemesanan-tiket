<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "uas_tiket";

    public function koneksi() {

        $conn = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        // CEK KONEKSI ERROR
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        return $conn;
    }
}

?>