<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();

if (!empty($_SESSION['data'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Nama');
    $sheet->setCellValue('B1', 'Email');

    $row = 2;
    foreach ($_SESSION['data'] as $data) {
        $sheet->setCellValue('A' . $row, $data['name']);
        $sheet->setCellValue('B' . $row, $data['email']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'data.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    $writer->save('php://output');
    exit;
} else {
    echo "Tidak ada data untuk diekspor.";
}
?>
