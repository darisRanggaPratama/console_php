<?php
require_once "connect.php";

// Inisialisasi array untuk menampung data
$data1 = array();
$data2 = array();
$data3 = array();
$data4 = array();
$data5 = array();
$data6 = array();
$data7 = array();


// Iterasi setiap baris dari hasil query
while ($row = mysqli_fetch_assoc($result))
{
// Tambahkan data ke array
$data1[] = $row['gaji'];
$data2[] = $row['lembur'];
$data3[] = $row['tj_lain'];
$data4[] = $row['bruto'];
$data5[] = $row['trf'];
$data6[] = $row['bln'];
$data7[] = $row['hmn'];
}

// Encode array ke format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
$data3 = json_encode($data3);
$data4 = json_encode($data4);
$data5 = json_encode($data5);
$data6 = json_encode($data6);
$data7 = json_encode($data7);
?>
