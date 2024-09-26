<?php
global $conn;
require_once('connect.php');

$sql = 'SELECT * FROM tb_warga ORDER BY nama';

$res = mysqli_query($conn, $sql);
$result = array();
while ($row = $res->fetch_assoc()) {
    array_push($result, array(
        'id' => $row['id'],
        'nama' => $row['nama'],
        'jk' => $row['jk'],
        'telp' => $row['telp']
    ));
}
echo json_encode(array('value' => 1, 'result' => $result));
mysqli_close($conn);


?>