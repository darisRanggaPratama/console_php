<?php
// Meng-include file konfigurasi database
global $conn;
include 'config.php';

// SQL query untuk mengambil kolom `id` dan `genre_name` dari tabel `genre`
$sql = "SELECT id, name, email FROM customer";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    // Mengambil data dan memasukkan ke dalam array
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "0 hasil";
}

$conn->close();
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
            <?php if (!empty($users)) { ?>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="2">Tidak ada data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
