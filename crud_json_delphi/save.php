<?php
global $conn;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];

    require_once('connect.php');
    $sql = "INSERT INTO tb_warga (nama, jk, telp) VALUES ('$nama', '$jk', '$telp')";
    if (mysqli_query($conn, $sql)) {
        $respon['value'] = 1;
        $respon['pesan'] = 'Data Berhasil disimpan';
        echo json_encode($respon);
    } else {
        $respon['value'] = 0;
        $respon['pesan'] = 'Terjadi kesalahan saat menyimpan data';
        echo json_encode($respon);
    }

    // tutup database
    mysqli_close($conn);
} else {
    $respon['value'] = 0;
    $respon['pesan'] = 'oops!, tidak menampilkan langsung...';
    echo json_encode($respon);
}

?>
