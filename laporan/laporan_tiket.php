<?php

require_once __DIR__ . "/fpdf/fpdf.php";
require_once __DIR__ . "/../config/Database.php";

/* ===========================
   KONEKSI DATABASE
=========================== */
$database = new Database();
$conn = $database->koneksi();

/* ===========================
   AMBIL DATA
=========================== */
$data = mysqli_query($conn, "SELECT * FROM tiket");
$total = mysqli_num_rows($data);
$totalHarga = 0;

/* ===========================
   CREATE PDF
=========================== */
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

/* ===========================
   LOGO
=========================== */
$pdf->Image(__DIR__ . "/../assets/img/logo_unpam.png", 15, 10, 22);

/* ===========================
   HEADER KAMPUS
=========================== */
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'UNIVERSITAS PAMULANG', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 6, 'Jl. Surya Kencana No.1 Pamulang, Tangerang Selatan', 0, 1, 'C');

$pdf->Cell(0, 6, 'SISTEM INFORMASI PEMESANAN TIKET', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, 'LAPORAN DATA PEMESANAN TIKET', 0, 1, 'C');

$pdf->Ln(3);
$pdf->Line(10, 40, 200, 40);
$pdf->Ln(6);

/* ===========================
   TANGGAL CETAK
=========================== */
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, 'Tanggal Cetak : ' . date('d F Y'), 0, 1, 'R');

$pdf->Ln(3);

/* ===========================
   HEADER TABEL
=========================== */
$pdf->SetFillColor(91, 108, 255);
$pdf->SetTextColor(255);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Nama Pemesan', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Tujuan', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Tanggal', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Jumlah', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Harga', 1, 1, 'C', true);

/* ===========================
   ISI TABEL
=========================== */
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0);

$no = 1;

while ($d = mysqli_fetch_assoc($data)) {

    $totalHarga += $d['harga'];

    $pdf->Cell(10, 9, $no++, 1, 0, 'C');
    $pdf->Cell(45, 9, $d['nama_pemesan'], 1);
    $pdf->Cell(40, 9, $d['tujuan'], 1);
    $pdf->Cell(30, 9, $d['tanggal'], 1, 0, 'C');
    $pdf->Cell(20, 9, $d['jumlah'], 1, 0, 'C');
    $pdf->Cell(40, 9, 'Rp ' . number_format($d['harga'], 0, ',', '.'), 1, 1, 'R');
}

/* ===========================
   RINGKASAN
=========================== */
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(0, 6, 'Jumlah Data        : ' . $total . ' Tiket', 0, 1);
$pdf->Cell(0, 6, 'Total Pendapatan : Rp ' . number_format($totalHarga, 0, ',', '.'), 0, 1);

/* ===========================
   TANDA TANGAN
=========================== */
$pdf->Ln(15);

$pdf->Cell(120);
$pdf->Cell(70, 6, 'Tangerang Selatan, ' . date('d F Y'), 0, 1, 'C');

$pdf->Cell(120);
$pdf->Cell(70, 6, 'Administrator', 0, 1, 'C');

$pdf->Ln(20);

$pdf->Cell(120);
$pdf->Cell(70, 6, 'Enisa Hutagalung', 0, 1, 'C');

/* ===========================
   OUTPUT (NORMAL VIEW, BUKAN DOWNLOAD AUTO)
=========================== */
$pdf->Output('I', 'laporan_tiket.pdf');

?>