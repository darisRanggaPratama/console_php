<?php
$SERVER = "localhost";
$USER = "rangga";
$PASSWORD = "rangga";
$DATABASE = "test";

try {
    $connect = new PDO("mysql:host=$SERVER; dbname=$DATABASE", $USER, $PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo $e->getMessage() . " Gagal Koneksi";
}

?>
