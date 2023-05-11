<?php
$host = "localhost";
$user = "rangga";
$password = "rangga";
$database = "test";

$connect = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_error()) {
    echo "Koneksi terputus";
} 

?>
