<html>
<head>
    <title>Insert Data Siswa</title>
</head>
<body>
<?php
global $connect;
include "connect.php";

if ($connect) {
    $NIS = $_POST['txtnis'];
    $NAMA = $_POST['txtnama'];
    $UMUR = $_POST['txtumur'];
    $GENDER = $_POST['rdoseks'];

    $sql = "INSERT INTO siswa (Nis, Nama, Umur, Seks) VALUES ('$NIS', '$NAMA', '$UMUR', '$GENDER')";

    mysqli_query($connect, $sql) or die("Can not insert data <br>[<a href='view.php'>View Data</a>]");
    echo "insert data successfully";
    echo "[<a href='view.php'>View data</a>]";
}

?>
</body>
</html>
