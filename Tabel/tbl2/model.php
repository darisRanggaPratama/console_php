<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

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

// Cek variable
// print_r($data1);
// var_dump($data1);

// Encode array ke format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
$data3 = json_encode($data3);
$data4 = json_encode($data4);
$data5 = json_encode($data5);
$data6 = json_encode($data6);
$data7 = json_encode($data7);

// Cek variable
//echo "\nprint_r".print_r($data1)."\n";
//echo "\nvar_dump".var_dump($data1)."\n";
// echo "\n".$data1."\n";
?>
