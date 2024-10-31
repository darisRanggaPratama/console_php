<?php
header("Content-Type: application/json");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfigurasi database
$servername = "localhost";
$username = "rangga";
$password = "rangga";
$dbname = "java_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Menerima data dari POST request
$id = isset($_POST['id']) ? $_POST['id'] : '';

// Validasi data
if (empty($id)) {
    echo json_encode(["error" => "ID is required"]);
    exit;
}

// Menyiapkan statement SQL
$sql = "DELETE FROM customer WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

// Eksekusi query
if ($stmt->execute()) {
    echo json_encode(["message" => "Record deleted successfully"]);
} else {
    echo json_encode(["error" => "Error deleting record: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
