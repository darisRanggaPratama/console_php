<?php
require_once "koneksi.php";
// Membuat tabel HTML
echo "<table class='table table-striped'>";
echo "<caption><h1>Gaji PT Ayang Tahun 2022</h1></caption>";
echo "<thead>";
echo "<tr>";
echo "<th>Bln</th>";
echo "<th>Gaji</th>";
echo "<th>Lembur</th>";
echo "<th>Tj Lain</th>";
echo "<th>Bruto</th>";
echo "<th>Transfer</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Menampilkan data dari tabel MySQL ke tabel HTML
while ($data = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $data['bln'] . "</td>";
    echo "<td>" . $data['gaji'] . "</td>";
    echo "<td>" . $data['lembur'] . "</td>";
    echo "<td>" . $data['tj_lain'] . "</td>";
    echo "<td>" . $data['bruto'] . "</td>";
    echo "<td>" . $data['trf'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Menutup koneksi ke database
mysqli_close($conn);
?>

