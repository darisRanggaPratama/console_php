<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOWNLOAD</title>
</head>
<body>
    <h3>DATA SISWA</h3>
    <a href="process.php">Export ke Excel</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>TELEPON</th>
            <th>ALAMAT</th>
        </tr>
        <?php
        include "connect.php";

        $query = "SELECT * FROM siswa";

        $sql = mysqli_query($connect, $query);

        $no = 1;

        while ($data = mysqli_fetch_array($sql)) {
            echo "<tr>"; 
            echo "<td>" .$no. "</td>";
            echo "<td>" .$data['nis']. "</td>";
            echo "<td>" .$data['nama']. "</td>";
            echo "<td>" .$data['gender']. "</td>";
            echo "<td>" .$data['telp']. "</td>";
            echo "<td>" .$data['alamat']. "</td>";
            echo "</tr>";
            $no++;
        }
?>
    </table>
</body>
</html>