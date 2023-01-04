<!DOCTYPE html>
<html lang="en">

<head>
    <title>Selisih Tanggal</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
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
            background-color: #5e5e5e;
            color: white;
        }

        table {
            border: 2px solid #9c27b0;
        }
    </style>

</head>

<body>
    <table>
        <caption>USIA</caption>
        <thead>
            <th>NO</th>
            <th>Awal</th>
            <th>Akhir</th>
            <th>Selisih</th>
            <th>Tahun</th>
            <th>Sisa Hari</th>
            <th>Bulan</th>
            <th>Hari</th>
        </thead>

        <?php
        echo "\r\n";
        // Trik 2
        // Connect database
        $connect = mysqli_connect("localhost", "rangga", "rangga", "test");

        // SQL Syntax
        $sql = "SELECT tglA, tglB, DATEDIFF(tglB, tglA) AS selisih,
        FLOOR(DATEDIFF(tglB, tglA) / 365) AS tahun,
        MOD(DATEDIFF(tglB, tglA) , 365) AS sisaHari,
        FLOOR(MOD(DATEDIFF(tglB, tglA) , 365) / 30) AS bulan,
        MOD(MOD(DATEDIFF(tglB, tglA) , 365) , 30) AS hari

        FROM test.tanggal";
        // Query database
        $hasil = mysqli_query($connect, $sql);

        // Tampilkan data dalam bentuk baris & kolom
        $x = 0;
        while ($data = mysqli_fetch_assoc($hasil)) {
            $x++;
            echo  "
            <tr>
            <td> $x </td>
            <td> $data[tglA] </td>
            <td> $data[tglB] </td>
            <td> $data[selisih]  </td>
            <td> $data[tahun]  </td>
            <td> $data[sisaHari]  </td>
            <td> $data[bulan]  </td>
            <td> $data[hari]  </td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>