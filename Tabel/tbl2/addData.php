<?php

session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

$response = array(
    'status' => 0,
    'msg' => 'Some problems occurred, please try again.'
);
if (!empty($_REQUEST['kode']) && !empty($_REQUEST['bln']) && !empty($_REQUEST['gaji']) &&
!empty($_REQUEST['lembur']) && !empty($_REQUEST['tj_lain']) && !empty($_REQUEST['bruto']) && !empty($_REQUEST['trf'])) {
    $kode = $_REQUEST['kode'];
    $bln = $_REQUEST['bln'];
    $gaji = $_REQUEST['gaji'];
    $lembur = $_REQUEST['lembur'];
    $tj_lain = $_REQUEST['tj_lain'];
    $bruto = $_REQUEST['bruto'];
    $trf = $_REQUEST['trf'];

    // Include the database config file
    require_once 'connect.php';

    $sql = "INSERT INTO gaji22(kode, bln, gaji, lembur, tj_lain, bruto, trf)
            VALUES ('$kode', '$bln', '$gaji', '$lembur', '$tj_lain', '$bruto', '$trf')";
    $insert = $connect->query($sql);

    if ($insert) {
        $response['status'] = 1;
        $response['msg'] = 'User data has been added successfully!';
    }
}else {
    $response['msg'] = 'Please fill all the mandatory fields.';
}

echo json_encode($response);
?>
