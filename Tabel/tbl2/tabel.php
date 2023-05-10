<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php");
}

require_once "connect.php";
// Membuat tabel HTML
echo "<table class='table table-striped'>";
// echo "<caption><h1>Gaji PT Ayang Tahun 2022</h1></caption>";
echo "<thead>";
echo "<tr>";
echo "<th>Bln</th>";
echo "<th>Gaji</th>";
echo "<th>Lembur</th>";
echo "<th>Tj Lain</th>";
echo "<th>Bruto</th>";
echo "<th>Transfer</th>";
echo "<th>Employee</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Menampilkan data dari tabel MySQL ke tabel HTML
while ($data = mysqli_fetch_array($result)) {
    $txtGaji = number_format($data['gaji'], 0, ",", ".");
    $txtLembur = number_format($data['lembur'], 0, ",", ".");
    $txtTjLain = number_format($data['tj_lain'], 0, ",", ".");
    $txtBruto = number_format($data['bruto'], 0, ",", ".");
    $txtTrf = number_format($data['trf'], 0, ",", ".");
    $txtHmn = number_format($data['hmn'], 0, ",", ".");

    echo "<tr>";
    echo "<td>" . $data['bln'] . "</td>";
    echo "<td>" . $txtGaji . "</td>";
    echo "<td>" . $txtLembur . "</td>";
    echo "<td>" . $txtTjLain . "</td>";
    echo "<td>" . $txtBruto . "</td>";
    echo "<td>" . $txtTrf . "</td>";
    echo "<td>". $txtHmn . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Menutup koneksi ke database
mysqli_close($connect);
?>

