<?php
global $conn;
if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
    $respon = array();
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];

    require_once ('connect.php');
    $sql = "UPDATE tb_warga SET nama = '$nama', jk = '$jk', telp = '$telp' WHERE id = '$id'";

    if(mysqli_query($conn, $sql)){
        $respon['value'] = 1;
        $respon['pesan'] = 'Data berhasil diedit';
        echo json_encode($respon);
    } else {
        $respon['value'] = 0;
        $respon['pesan'] = 'Terjadi kesalahan saat edit data';
        echo json_encode($respon);
    }

    // Tutup database
    mysqli_close($conn);
} else{
    $respon['value'] = 0;
    $respon['pesan'] = 'Oops!, tidak bisa menampilkan langsung';
    echo json_encode($respon);
}

?>
