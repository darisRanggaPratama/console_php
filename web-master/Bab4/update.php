<html>
<head>
    <title>
        Update Data Siswa
    </title>
</head>
<body>
<?php
global $connect;
include "connect.php";

if($connect){
    $NISH = $_POST['NISH'];
    $NAMA = $_POST['txtnama'];
    $UMUR = $_POST['txtumur'];
    $SEX = $_POST['rdoseks'];

    $sql = "UPDATE siswa SET Nama='$NAMA', Umur='$UMUR', Seks='$SEX' WHERE NIS='$NISH'";
    mysqli_query($connect, $sql) or die("Update data successfully<br>
[<a href='view.php'>View data</a>]");
    echo "Siswa dengan NIS = $NISH \nBerhasil diperbaharui";
    echo "<br>[<a href='view.php'>View Data siswa</a>]";
}
?>
</body>
</html>
