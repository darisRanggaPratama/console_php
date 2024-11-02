<?php
header('Content-Type: application/json');
require_once 'members.php';

$members = new Members();

$action = $_REQUEST['action'] ?? '';

switch($action) {
    case 'getAll':
        $stmt = $members->getAll();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['data' => $data]);
        break;

    case 'create':
        $result = $members->create($_POST);
        echo json_encode(['success' => $result]);
        break;

    case 'update':
        $result = $members->update($_POST);
        echo json_encode(['success' => $result]);
        break;

    case 'delete':
        $result = $members->delete($_POST['id']);
        echo json_encode(['success' => $result]);
        break;

    case 'export':
        $members->exportCSV();
        break;

    case 'downloadTemplate':
        $members->downloadTemplate();
        break;

    case 'import':
        if (isset($_FILES['csv_file'])) {
            $result = $members->importCSV($_FILES['csv_file']);
            echo json_encode(['success' => $result]);
        }
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
}
?>
