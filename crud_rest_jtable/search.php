<?php
// search.php
global $pdo;
require 'database.php';

header('Content-Type: application/json');

if (isset($_GET['query'])) {
    $query = '%' . $_GET['query'] . '%';
    $sql = "SELECT * FROM customer WHERE name LIKE ? OR email LIKE ? OR birth LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$query, $query, $query]);
    $customers = $stmt->fetchAll();
    echo json_encode($customers);
} else {
    echo json_encode(['error' => 'No search query provided']);
}
?>