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

logMessage("Get Data API called");

// Konfigurasi database
$servername = "localhost";
$username = "rangga";
$password = "rangga";
$dbname = "java_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    logMessage("Connection failed: " . $conn->connect_error);
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

logMessage("Connected to database successfully");

// Query untuk mengambil data
$sql = "SELECT id, name, email, birth FROM customer";
$result = $conn->query($sql);

if ($result) {
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
    logMessage("Data retrieved successfully. Row count: " . count($data));
} else {
    logMessage("Error retrieving data: " . $conn->error);
    echo json_encode(["error" => "Error retrieving data: " . $conn->error]);
}

$conn->close();
logMessage("Connection closed");
?>
