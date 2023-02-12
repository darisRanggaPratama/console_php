<?php

$host = 'localhost';
$user = 'rangga';
$password = 'rangga';
$database = 'test';

$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect) {
    die('Koneksi terputus: '.mysqli_connect_error());
}

?>
