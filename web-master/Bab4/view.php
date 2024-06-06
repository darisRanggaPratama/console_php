<?php
// Meng-include file konfigurasi database
global $connect;
include 'connect.php';

// Jalankan query untuk mengambil data dari tabel customer
$sql = "SELECT Nis, Nama, Umur, Seks FROM siswa";
$result = $connect->query($sql);

$jumlah_record = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Daftar User</title>
</head>
<body>
<div class="container mt-3">
    <h1 class="mb-4">Daftar Siswa</h1>
    <?php
    echo "[<a href='add.php'>Insert Data</a>]";
    echo "<div><td>Jumlah Siswa:</td><td> " . $jumlah_record . "</td></div>";
    ?>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th></th>
            <th>NO</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Gender</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Gunakan mysqli_fetch_array() untuk mengambil data
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td><a href=\"edit.php?NIS=$row[Nis]\">Edit</a></td>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $row['Nis'] . "</td>";
                echo "<td>" . $row['Nama'] . "</td>";
                echo "<td>" . $row['Umur'] . "</td>";
                echo "<td>" . $row['Seks'] . "</td>";
                echo "<td><a href=\"delete.php?NIS=$row[Nis]\">Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }

        // Tutup koneksi
        $connect->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
