<?php
// Data koneksi
$server = 'localhost';
$user = 'rangga';
$password = 'rangga';
$database = 'test';

// Koneksi ke database
$connect = mysqli_connect($server, $user, $password, $database);

// Query untuk mengambil data dari tabel
$thn = 2021;
$query = "SELECT BULAN, GAJI, BRUTO, TRANSFER, KODE REGEXP '^".$thn."' AS search
            FROM dummy
            HAVING search = 1
            ORDER BY KODE ASC";

$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
