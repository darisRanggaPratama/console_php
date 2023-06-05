<?php
require_once "connect.php";

// Array untuk menyimpan data
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

// Encode data ke dalam format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
