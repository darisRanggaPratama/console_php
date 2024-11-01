<?php
$host = 'localhost';
$username = 'hyvoycom_rangga';
$password = '20061988rangga';
$database = 'hyvoycom_avengers';

try {
    $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
