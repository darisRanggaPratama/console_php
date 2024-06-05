<!DOCTYPE html>
<html>
<head>
    <title>Program Pangkat</title>
</head>
<body>

<h2>Program Menghitung Pangkat</h2>
<form method="post">
    Basis: <input type="number" name="base" required><br><br>
    Eksponen: <input type="number" name="exponent" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $exponent = $_POST['exponent'];

    // Fungsi untuk menghitung pangkat
    function calculatePower($base, $exponent) {
        return pow($base, $exponent);
    }

    $result = calculatePower($base, $exponent);
    echo "<h3>Hasil dari " . $base . "^" . $exponent . " adalah: " . $result . "</h3>";
}
?>

</body>
</html>



