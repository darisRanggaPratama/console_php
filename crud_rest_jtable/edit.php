<?php
global $pdo;
require 'database.php';

header('Content-Type: application/json');

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Function to log messages
function logMessage($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . PHP_EOL, 3, 'debug.log');
}

logMessage("Edit.php script started");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logMessage("Received POST request");

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $birth = isset($_POST['birth']) ? $_POST['birth'] : '';

    logMessage("Received data - ID: $id, Name: $name, Email: $email, Birth: $birth");

    if (empty($id) || empty($name) || empty($email) || empty($birth)) {
        logMessage("Error: All fields are required");
        echo json_encode(['error' => 'All fields are required']);
        exit;
    }

    try {
        $sql = "UPDATE customer SET name = :name, email = :email, birth = :birth WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        logMessage("Executing SQL: $sql");

        $result = $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':birth' => $birth
        ]);

        if ($result) {
            $rowCount = $stmt->rowCount();
            logMessage("Update successful. Rows affected: $rowCount");
            if ($rowCount > 0) {
                echo json_encode(['message' => 'Customer updated successfully']);
            } else {
                echo json_encode(['message' => 'No changes were made or customer not found']);
            }
        } else {
            $errorInfo = $stmt->errorInfo();
            logMessage("Update failed. Error: " . $errorInfo[2]);
            echo json_encode(['error' => 'Failed to update customer: ' . $errorInfo[2]]);
        }
    } catch (PDOException $e) {
        logMessage("PDO Exception: " . $e->getMessage());
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    logMessage("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(['error' => 'Invalid request method']);
}

logMessage("Edit.php script ended");