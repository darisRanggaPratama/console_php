<?php
global $connect;
require_once 'connects.php';

try {
// Query untuk mengambil semua data
    $query = $connect->query("SELECT * FROM members");
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

// Return data dalam format JSON untuk DataTables
    echo json_encode(['data' => $data]);
}
catch (PDOException $e){
    // Log error dan return empty dataset
    error_log($e->getMessage());
    echo json_encode(['data' => []]);
}
?>
