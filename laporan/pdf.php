<?php
require_once "../config/Database.php";
require_once "../model/Tiket.php";
require_once "../fpdf/fpdf.php";

$db = (new Database())->koneksi();
$tiket = new Tiket($db);
$data = $tiket->tampil();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Cell(190,10,'LAPORAN DATA TIKET',0,1,'C');

while($row = $data->fetch_assoc()) {
    $pdf->Cell(190,10,
        $row['id']." | ".$row['nama_pemesan']." | ".$row['tujuan'],
    0,1);
}

$pdf->Output();