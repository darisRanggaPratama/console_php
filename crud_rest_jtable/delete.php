<?php
// delete.php
global $pdo;
require 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $sql = "DELETE FROM customer WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id])) {
        echo json_encode(['message' => 'Customer deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete customer']);
    }
}
?>
