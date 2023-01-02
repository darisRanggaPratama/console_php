<!DOCTYPE html>
<html lang="en">

<head>
    <title>Selisih Tanggal</title>
    <style>
        /* Style untuk tabel */
        table {
            border-collapse: collapse;
            /* Menyatukan sel-sel bersinggungan */
            width: 100%;
            /* Lebar tabel penuh */
        }

        /* Style untuk sel tabel */
        td,
        th {
            border: 1px solid #dddddd;
            /* Garis tepi sel */
            text-align: left;
            /* Align teks ke kiri */
            padding: 8px;
            /* Jarak antara teks dan tepi sel */
        }

        /* Style untuk baris tabel */
        tr:nth-child(even) {
            background-color: #dddddd;
            /* Warna latar genap */
        }
    </style>
</head>

<body>
    <p><img src="selisih.jpg"></p>
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