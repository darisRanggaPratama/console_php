<?php
// Data koneksi
$server = 'localhost';
$user = 'rangga';
$password = 'rangga';
$database = 'test';

// Koneksi ke database
$connect = mysqli_connect($server, $user, $password, $database);

// Query untuk mengambil data dari tabel
//$thn = 2021;
// $query = "SELECT BULAN, GAJI, BRUTO, TRANSFER, KODE REGEXP '^".$thn."' AS search
//             FROM dummy
//             HAVING search = 1
//             ORDER BY KODE ASC";

$thn1 = $_GET['thn1']??'2023';
$thn2 = $_GET['thn2']??'2023';
$bln1 = $_GET['bln1']??'01';
$bln2 = $_GET['bln2']??'12';

// WHERE kode BETWEEN '2022-01' AND '2022-05'

// $query = "SELECT GAJI, BULAN, TRANSFER, KODE FROM dummy WHERE KODE LIKE '%$thn1-$bln1%' OR KODE LIKE '%$thn2-$bln2%'";

$query = "SELECT GAJI, BULAN, TRANSFER, KODE FROM dummy WHERE KODE BETWEEN '$thn1-$bln1' AND '$thn2-$bln2'";

// echo $query;



$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);



