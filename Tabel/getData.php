<?php
// Include the database config file
require_once 'dbConnect.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$searchTerm = isset($_POST['term']) ? $db->real_escape_string($_POST['term']) : '';

$offset = ($page-1)*$rows;

$result = array();

$whereSQL = "first_name LIKE '$searchTerm%' OR last_name LIKE '$searchTerm%' OR email LIKE '$searchTerm%' OR phone LIKE '$searchTerm%'";
$result = $db->query("SELECT COUNT(*) FROM users WHERE $whereSQL");
$row = $result->fetch_row();
$response["total"] = $row[0];

$result = $db->query( "SELECT * FROM users WHERE $whereSQL ORDER BY id DESC LIMIT $offset,$rows");

$users = array();
while($row = $result->fetch_assoc()){
    array_push($users, $row);
}
$response["rows"] = $users;

echo json_encode($response);
?>

