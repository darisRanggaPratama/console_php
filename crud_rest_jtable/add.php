<?php
global $pdo;
// add.php
require 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '-';
    $name = isset($_POST['name']) ? $_POST['name'] : '-';
    $email = isset($_POST['email']) ? $_POST['email'] : '-';
    $birth = isset($_POST['birth']) ? $_POST['birth'] : '-';

    $sql = "INSERT INTO customer (id, name, email, birth) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id, $name, $email, $birth])) {
        echo json_encode(['message' => 'Customer added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add customer']);
    }
}

?>