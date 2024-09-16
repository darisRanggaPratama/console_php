<?php
global $conn;
if ($_SERVER['REQUEST_METHOD'] ==  'POST'){
    $respon = array();
    $id = $_POST['id'];

    require_once ('connect.php');
    $sql = "DELETE FROM tb_warga WHERE id = '$id'";

    if(mysqli_query($conn, $sql)){
        $respon['value'] = 1;
        $respon['pesan'] = 'Data berhasil dihapus';
        echo json_encode($respon);
    } else {
        $respon['value'] = 0;
        $respon['pesan'] = 'Terjadi kesalahan saat hapus data';
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
