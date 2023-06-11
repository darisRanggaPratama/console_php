<?php
require_once "connect.php";

// Default year and month
$year1 = $_GET['year1'] ?? '2023';
$year2 = $_GET['year2'] ?? '2023';
$month1 = $_GET['month1'] ?? '01';
$month2 = $_GET['month2'] ?? '12';

// Request column (Query)
$query = "SELECT GAJI, BULAN, TRANSFER, KODE
FROM dummy
WHERE KODE BETWEEN '$year1-$month1' AND '$year2-$month2'
ORDER BY KODE";

// Execute/ send query to database
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);

// Array to store data
$data1 = array();
while ($row = mysqli_fetch_array($result1)) {
    $data1[] = array(
        'Bulan' => $row['BULAN'],
        'Gaji' => $row['GAJI']
    );
}

$data2 = array();
while ($row = mysqli_fetch_array($result2)) {
    $data2[] = array(
        'Bulan' => $row['BULAN'],
        'Transfer' => $row['TRANSFER']
    );
}

// Encode data into format of JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
