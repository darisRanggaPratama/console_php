<?php
include 'connect.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$style_col = [
    'font' => ['bold' => true],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
]
    ];

    $style_row = [
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
        ]
    ];

    $sheet->setCellValue('A1', "DATA SISWA");
    $sheet->mergeCells('A1:F1');
    $sheet->getStyle('A1')->getFont()->setBold(true);
    $sheet->getStyle('A1')->getFont()->setSize(15);

    $sheet->setCellValue('A3', "NO");
    $sheet->setCellValue('B3', "NIS");
    $sheet->setCellValue('C3', "NAMA");
    $sheet->setCellValue('D3', "JENIS KELAMIN");
    $sheet->setCellValue('E3', "TELEPON");
    $sheet->setCellValue('F3', "ALAMAT");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);

    $sheet->getRowDimension('1')->setRowHeight(20);
    $sheet->getRowDimension('2')->setRowHeight(20);
    $sheet->getRowDimension('3')->setRowHeight(20);

    $query = "SELECT * FROM siswa";
    $sql = mysqli_query($connect, $query);

    $no = 1;
    $row = 4;
    while ($data = mysqli_fetch_array($sql)) {
        $sheet->setCellValue('A' . $row, $no);
        $sheet->setCellValue('B' . $row, $data['nis']);
        $sheet->setCellValue('C' . $row, $data['nama']);
        $sheet->setCellValue('D' . $row, $data['gender']);
    

    $sheet->setCellValueExplicit('E' . $row, $data['telp'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $sheet->setCellValue('F' . $row, $data['alamat']);

    $sheet->getStyle('A' . $row)->applyFromArray($style_row);
    $sheet->getStyle('B' . $row)->applyFromArray($style_row);
    $sheet->getStyle('C' . $row)->applyFromArray($style_row);
    $sheet->getStyle('D' . $row)->applyFromArray($style_row);
    $sheet->getStyle('E' . $row)->applyFromArray($style_row);
    $sheet->getStyle('F' . $row)->applyFromArray($style_row);

    $sheet->getStyle('A' . $row)->getAlignment()->
    setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('B' . $row)->getAlignment()->
    setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

    $sheet->getRowDimension($row)->setRowHeight(20);

    $no++;
    $row++;
}

    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(15);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(30);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("Laporan Data Siswa");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachement; filename="Data Siswa.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');











