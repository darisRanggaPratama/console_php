<html>
<head>Hapus Data Siswa</head>
<body>
<?php
global $connect;
include "connect.php";

if ($connect){
    $NIS = $_GET['NIS'];
    $sql = "DELETE FROM siswa WHERE Nis='$NIS'";
    $result_query = mysqli_query($connect, $sql) or die("Fail to Delete");
    if($result_query){
        echo "ID siswa: $NIS . Berhasil dihapus";
    }
    echo "<br>";
    echo "[<a href='view.php'>View Data</a>]";
}
?>
</body>
</html>


