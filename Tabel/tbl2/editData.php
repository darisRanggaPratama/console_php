<?php
$response = array(
    'status' => 0,
    'msg' => 'Some problems occurred, please try again.'
);
if (!empty($_REQUEST['kode']) && !empty($_REQUEST['bln']) && !empty($_REQUEST['gaji'])
&& !empty($_REQUEST['lembur']) && !empty($_REQUEST['tj_lain']) && !empty($_REQUEST['bruto'])
&& !empty($_REQUEST['trf'])) {
    $kode = $_REQUEST['kode'];
    $bln = $_REQUEST['bln'];
    $gaji = $_REQUEST['gaji'];
    $lembur = $_REQUEST['lembur'];
    $tj_lain = $_REQUEST['tj_lain'];
    $bruto = $_REQUEST['bruto'];
    $trf = $_REQUEST['trf'];

    if (!empty($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);

        // Include the database config file
        require_once 'dbConnect.php';

        $sql = "UPDATE gaji22 SET kode='$kode', bln='$bln', gaji='$gaji',
        lembur='$lembur', tj_lain='$tj_lain', bruto='$bruto', trf='$trf' WHERE id = $id";
        $update = $db->query($sql);

        if ($update) {
            $response['status'] = 1;
            $response['msg'] = 'User data has been updated successfully!';
        }
    }
}else {
    $response['msg'] = 'Please fill all the mandatory fields.';
}

echo json_encode($response);
?>
