<!DOCTYPE html>
<html lang="en">

<head>
    <title>Selisih Tanggal</title>
    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

th {
    background-color: #9c27b0;
    color: white;
}

td {
    border-bottom: 1px solid #e0e0e0;
}

tr:hover {
    background-color: #9c27b0;
    color: white;
}

table {
    border: 2px solid #9c27b0;
}
</style>

</head>

<body>
    <table>
        <thead>
            <th>Awal</th>
            <th>Akhir</th>
            <th>Selisih</th>
        </thead>

        <?php
        echo "\r\n";
        // Trik 2
        // Connect database
        $connect = mysqli_connect("localhost", "rangga", "rangga", "test");

        // SQL Syntax
        $sql = "SELECT tglA, tglB, datediff(tglA, tglB) AS selisihTgl FROM test.tanggal";
        // Query database
        $hasil = mysqli_query($connect, $sql);

        // Tampilkan data dalam bentuk baris & kolom
        while ($data = mysqli_fetch_assoc($hasil)) {
            echo "<tr><td> $data[tglA] </td> <td> $data[tglB] </td> <td> $data[selisihTgl] </td></tr>";
        }
        ?>
    </table>
</body>

</html>