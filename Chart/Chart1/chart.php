<?php
require_once "koneksi.php";

$sql = $connect->prepare('SELECT * FROM kota ORDER BY jumlah DESC');
$sql->execute();
while($data=$sql->fetch(PDO::FETCH_ASSOC)){
    extract($data);
    $json[]=[(string)$kota, (int)$jumlah ];
}
echo json_encode($json);



?>
