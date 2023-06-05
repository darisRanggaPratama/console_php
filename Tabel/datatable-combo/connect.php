<?php
$host = 'localhost';
$user = 'rangga';
$password = 'rangga';
$database = 'test';

$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect){
    echo "Gagal konek";
}