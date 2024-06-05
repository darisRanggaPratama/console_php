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
    <h1 class="mb-4">Daftar User</h1>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Meng-include file konfigurasi database
        global $conn;
        include 'config.php';

        // Jalankan query untuk mengambil data dari tabel customer
        $sql = "SELECT id, name, email FROM customer";
        $result = $conn->query($sql);

        // Gunakan mysqli_fetch_array() untuk mengambil data
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }

        // Tutup koneksi
        $conn->close();
        ?>

        </tbody>
    </table>
</div>

</body>
</html>
