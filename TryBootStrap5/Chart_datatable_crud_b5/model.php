<?php
require_once "connect.php";

// Default year and month
$year1 = $_GET['year1'] ?? '2023';
$year2 = $_GET['year2'] ?? '2023';
$month1 = $_GET['month1'] ?? '01';
$month2 = $_GET['month2'] ?? '12';

// Request column (Query)
$query = "SELECT *
FROM dummy
WHERE KODE BETWEEN '$year1-$month1' AND '$year2-$month2'
ORDER BY KODE";

// Execute/ send query to database
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
$result3 = mysqli_query($connect, $query);
$result4 = mysqli_query($connect, $query);
$result5 = mysqli_query($connect, $query);
$result6 = mysqli_query($connect, $query);
$result7 = mysqli_query($connect, $query);


// Array to store data
$data1 = array();
while ($row = mysqli_fetch_array($result1)) {
    $data1[] = array(
        'Bulan' => $row['BULAN'],
        'Bruto' => $row['BRUTO']
    );
}

$data2 = array();
while ($row = mysqli_fetch_array($result2)) {
    $data2[] = array(
        'Bulan' => $row['BULAN'],
        'Transfer' => $row['TRANSFER']
    );
}

$data3 = array();
while ($row = mysqli_fetch_array($result3)) {
    $data3[] = array(
        'Bulan' => $row['BULAN'],
        'GP' => $row['GAJI']
    );
}

$data4 = array();
while ($row = mysqli_fetch_array($result4)) {
    $data4[] = array(
        'Bulan' => $row['BULAN'],
        'Potong' => $row['POTONGAN']
    );
}

$data5 = array();
while ($row = mysqli_fetch_array($result5)) {
    $data5[] = array(
        'Bulan' => $row['BULAN'],
        'Tj_lain' => $row['TJ_LAIN']
    );
}

$data6 = array();
while ($row = mysqli_fetch_array($result6)) {
    $data6[] = array(
        'Bulan' => $row['BULAN'],
        'Lembur' => $row['LEMBUR']
    );
}

$data7 = array();
while ($row = mysqli_fetch_array($result7)) {
    $data7[] = array(
        'Bulan' => $row['BULAN'],
        'Human' => $row['HUMAN']
    );
}

// Encode data into format of JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
$data3 = json_encode($data3);
$data4 = json_encode($data4);
$data5 = json_encode($data5);
$data6 = json_encode($data6);
$data7 = json_encode($data7);
