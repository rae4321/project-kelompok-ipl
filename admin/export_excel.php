<?php
session_start();
require_once "../config/koneksi.php";
require_once "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$resData = mysqli_query($conn, "SELECT *, tagihan.id AS tagihanID, rumah.id AS rumahID FROM tagihan INNER JOIN rumah ON tagihan.rumah_id = rumah.id ORDER BY tagihan.id DESC");
if (!$resData) {
    die('Database query error: ' . mysqli_error($conn));
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Rumah');
$sheet->setCellValue('C1', 'Bulan Tagihan');
$sheet->setCellValue('D1', 'Tahun Tagihan');
$sheet->setCellValue('E1', 'Status');

$rowNumber = 2;
$no = 1;
while ($rowData = mysqli_fetch_assoc($resData)) {
    $status = '';
    switch ($rowData['status']) {
        case 0:
            $status = 'Belum lunas';
            break;
        case 1:
            $status = 'Pending';
            break;
        case 2:
            $status = 'Lunas';
            break;
    }
    $sheet->setCellValue('A' . $rowNumber, $no++);
    $sheet->setCellValue('B' . $rowNumber, $rowData['alamat']);
    $sheet->setCellValue('C' . $rowNumber, bulanIndo($rowData['bulan']));
    $sheet->setCellValue('D' . $rowNumber, $rowData['tahun']);
    $sheet->setCellValue('E' . $rowNumber, $status);
    $rowNumber++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="data_tagihan.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
