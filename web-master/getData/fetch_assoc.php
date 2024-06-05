<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "rangga";  // Ganti dengan username MySQL Anda
$password = "rangga";      // Ganti dengan password MySQL Anda
$dbname = "java_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel genre
$sql = "SELECT id, name, email FROM customer";
$result = $conn->query($sql);

// Array untuk menyimpan data
$user = array();

if ($result->num_rows > 0) {
    // Memasukkan data ke dalam array
    while($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Genre</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Data User</h2>

<table>
    <tr>
        <th>NO</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>

    <?php
    if (!empty($user)) {
        $no = 0;
        foreach ($user as $users) {
            $no++;
            echo "<tr><td>" . $no . "</td><td>" . $users["id"] .
                "</td><td>" . $users["name"] . "</td><td>" . $users["email"] .
                "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data available</td></tr>";
    }
    ?>
</table>

</body>
</html>
