<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        Data Siswa Hasil Import
    </h3>
    <a href="form.php" >Import Data</a>
    <br>
    <br>
    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Telepon</th>
            <th>Alamat</th> 
        </tr>
        <?php
        include 'connect.php';

        $query = "SELECT * FROM siswa";

        $sql = mysqli_query($connect, $query);

        $no = 1;

        while ($data = mysqli_fetch_array($sql)){
            echo "<tr>";
            echo "<td>" .$no++."</td>";
            echo "<td>" .$data['nis']. "</td>";
            echo "<td>" .$data['nama']. "</td>";
            echo "<td>" .$data['gender']. "</td>";
            echo "<td>" .$data['telp']. "</td>";
            echo "<td>" .$data['alamat']. "</td>";
            echo "</tr>";

        }
        ?>
    </table>
</body>
</html>