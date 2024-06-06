<?php
$host = "localhost";
$user = "rangga";
$password = "rangga";
$database = "sekolah";

$connect = mysqli_connect($host, $user, $password) or die("disconnect from database");
mysqli_select_db($connect, $database) or die("can not find database");


