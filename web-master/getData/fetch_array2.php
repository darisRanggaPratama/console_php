<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <!-- Link Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <h1 class="mb-4">Customer List</h1>
    <?php
    // Konfigurasi database
    $host = 'localhost';
    $dbname = 'java_database';
    $username = 'rangga';
    $password = 'rangga';

    try {
        // Membuat koneksi
        $mysqli = new mysqli($host, $username, $password, $dbname);

        // Cek koneksi
        if ($mysqli->connect_error) {
            throw new Exception("Koneksi gagal: " . $mysqli->connect_error);
        }

        // Query untuk mengambil data dari tabel customer
        $query = "SELECT id, name, email FROM customer";
        $result = $mysqli->query($query);

        if (!$result) {
            throw new Exception("Error dalam query: " . $mysqli->error);
        }

        // Tampilkan hasil dalam tabel Bootstrap
        echo '<table class="table table-dark table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Email</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Mengambil data menggunakan mysqli_fetch_array()
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Bersihkan hasil
        $result->free();

        // Tutup koneksi
        $mysqli->close();
    } catch (Exception $e) {
        // Tangani kesalahan
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Error: ' . $e->getMessage();
        echo '</div>';
    }
    ?>
</div>


</body>
</html>

