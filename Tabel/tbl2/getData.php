<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

// Include the database config file
require_once 'connect.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$searchTerm = isset($_POST['term']) ? $connect->real_escape_string($_POST['term']) : '';

$offset = ($page-1)*$rows;

$result = array();

$whereSQL = "kode LIKE '$searchTerm%' OR bln LIKE '$searchTerm%' OR gaji
LIKE '$searchTerm%' OR trf LIKE '$searchTerm%'";
$result = $connect->query("SELECT COUNT(*) FROM gaji22 WHERE $whereSQL");
$row = $result->fetch_row();
$response["total"] = $row[0];

$result = $connect->query("SELECT * FROM gaji22 WHERE $whereSQL ORDER BY id LIMIT $offset,$rows");

$users = array();
while ($row = $result->fetch_assoc()) {
    array_push($users, $row);
}
$response["rows"] = $users;

echo json_encode($response);
?>

