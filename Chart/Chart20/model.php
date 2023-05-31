<?php
require_once "koneksi.php";

// Inisialisasi array untuk menampung data
$data1 = array();
$data2 = array();
$data3 = array();



// Iterasi setiap baris dari hasil query
while ($row = mysqli_fetch_assoc($result))
{
    // Tambahkan data ke array

$data1[] = $row['bruto'];
$data2[] = $row['trf'];
$data3[] = $row['bln'];
}

// Encode array ke format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
$data3 = json_encode($data3);


?>
