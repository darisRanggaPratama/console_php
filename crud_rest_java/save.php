<?php
header("Content-Type: application/json");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Function to log messages
function logMessage($message) {
    file_put_contents('api_log.txt', date('[Y-m-d H:i:s] ') . $message . PHP_EOL, FILE_APPEND);
}

logMessage("API called");

// Konfigurasi database
$servername = "localhost";
$username = "rangga";
$password = "rangga";
$dbname = "java_database";

logMessage("Attempting to connect to database: $dbname");

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    logMessage("Connection failed: " . $conn->connect_error);
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

logMessage("Connected to database successfully");

// Menerima data dari POST request
$id = isset($_POST['id']) ? $_POST['id'] : '_';
$name = isset($_POST['name']) ? $_POST['name'] : '_';
$email = isset($_POST['email']) ? $_POST['email'] : '_';
$birth = isset($_POST['birth']) ? $_POST['birth'] : '_';

logMessage("Received data - ID: $id, Nama: $name, $email, Tanggal: $birth");

// Validasi data
if (empty($id) || empty($name) || empty($birth) || empty($email)) {
    logMessage("Validation failed: Empty fields");
    echo json_encode(["error" => "Semua field harus diisi"]);
    exit;
}

// Menyiapkan statement SQL
$sql = "INSERT INTO customer (id, name, email, birth) VALUES (?, ?, ?, ?)";
logMessage("Preparing SQL statement: $sql");

$stmt = $conn->prepare($sql);
if (!$stmt) {
    logMessage("Prepare failed: " . $conn->error);
    echo json_encode(["error" => "Prepare failed: " . $conn->error]);
    exit;
}

logMessage("Statement prepared successfully");

// Binding parameters
logMessage("Binding parameters: id=$id, nama=$name, $email tanggal=$birth");
$bindResult = $stmt->bind_param("ssss", $id, $name, $email, $birth);
if (!$bindResult) {
    logMessage("Parameter binding failed: " . $stmt->error);
    echo json_encode(["error" => "Parameter binding failed: " . $stmt->error]);
    exit;
}
logMessage("Parameters bound to statement successfully");

// Eksekusi query
if ($stmt->execute()) {
    logMessage("Query executed successfully. Affected rows: " . $stmt->affected_rows);
    echo json_encode(["message" => "Data berhasil disimpan"]);
} else {
    logMessage("Error executing query: " . $stmt->error);
    echo json_encode(["error" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
logMessage("Statement and connection closed");
?>