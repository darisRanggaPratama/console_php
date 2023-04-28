<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

$response = array(
    'status' => 0,
    'msg' => 'Some problems occurred, please try again.'
);
if (!empty($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);

    // Include the database config file
    require_once 'connect.php';

    $sql = "DELETE FROM gaji22 WHERE id = $id";
    $delete = $connect->query($sql);

    if ($delete) {
        $response['status'] = 1;
        $response['msg'] = 'User data has been deleted successfully!';
    }
}

echo json_encode($response);
?>
