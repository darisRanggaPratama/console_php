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
$id = isset($_POST['id']) ? $_POST['id'] : '-';
$name = isset($_POST['name']) ? $_POST['name'] : '-';
$email = isset($_POST['email']) ? $_POST['email'] : '-';
$birth = isset($_POST['birth']) ? $_POST['birth'] : '-';

// Validasi data
if (empty($id) || empty($name) || empty($email) || empty($birth)) {
    echo json_encode(["error" => "All fields are required"]);
    exit;
}

// Menyiapkan statement SQL
$sql = "UPDATE customer SET name=?, email=?, birth=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $birth, $id);

// Eksekusi query
if ($stmt->execute()) {
    echo json_encode(["message" => "Record updated successfully"]);
} else {
    echo json_encode(["error" => "Error updating record: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
