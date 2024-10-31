<?php
// view.php
global $pdo;
require 'database.php';

header('Content-Type: application/json');

$stmt = $pdo->query('SELECT * FROM customer ORDER BY rowid DESC');
$customers = $stmt->fetchAll();

echo json_encode($customers);
?>
