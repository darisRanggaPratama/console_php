<?php
require_once 'config.php';

// Read all records
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $pdo->query("SELECT * FROM members");
        $data = $stmt->fetchAll();
        echo json_encode(['data' => $data]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

// Create new record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);

        $stmt = $pdo->prepare("INSERT INTO members (title, image, release_at, summary) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['title'], $data['image'], $data['release_at'], $data['summary']]);

        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

// Update record
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);

        $stmt = $pdo->prepare("UPDATE members SET title = ?, image = ?, release_at = ?, summary = ? WHERE id = ?");
        $stmt->execute([$data['title'], $data['image'], $data['release_at'], $data['summary'], $data['id']]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

// Delete record
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
        $stmt->execute([$id]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>
