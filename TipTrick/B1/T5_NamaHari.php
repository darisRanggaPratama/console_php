<!DOCTYPE html>
<html lang="en">

<head>
    <title>Selisih Tanggal</title>
    <style>
        table {
            border-collapse: collapse;
            border: 2px solid #9c27b0;
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
    </style>

</head>

<body>
    <table>
        <caption>Nama Hari</caption>
        <thead>
            <th>NO</th>
            <th>Tgl A</th>
            <th>Selisih A</th>
            <th>Hari A</th>
            <th>Tgl B</th>
            <th>Selisih B</th>
            <th>Hari B</th>

        </thead>

        <?php
        echo "\r\n";
        // Trik 2
        // Connect database
        $connect = mysqli_connect("localhost", "rangga", "rangga", "test");

        // SQL Syntax
        $sql = "SELECT tglA, tglB,
        DATEDIFF(tglA, CURDATE()) AS hariA,
        DATEDIFF(tglB, CURDATE()) AS hariB

        FROM test.tanggal";
        // Query database
        $hasil = mysqli_query($connect, $sql);

        // Tampilkan data dalam bentuk baris & kolom
        $x = 0;
        while ($data = mysqli_fetch_assoc($hasil)) {
            $x++;
            $selisihA = $data['hariA'];
            $slshA = mktime(0, 0, 0, date("m"), date("d") + $selisihA, date("Y"));
            $dayA = date("l", $slshA);

            $selisihB = $data['hariB'];
            $slshB = mktime(0, 0, 0, date("m"), date("d") + $selisihB, date("Y"));
            $dayB = date("l", $slshB);

            if ($dayA == "Sunday") {
                $dayA = "Minggu";
            } elseif ($dayA == "Monday") {
                $dayA = "Senin";
            } elseif ($dayA == "Tuesday") {
                $dayA = "Selasa";
            } elseif ($dayA == "Wednesday") {
                $dayA = "Rabu";
            } elseif ($dayA == "Thursday") {
                $dayA = "Kamis";
            } elseif ($dayA == "Friday") {
                $dayA = "Jum'at";
            } elseif ($dayA == "Saturday") {
                $dayA = "Sabtu";
            }

            if ($dayB == "Sunday") {
                $dayB = "Minggu";
            } elseif ($dayB == "Monday") {
                $dayB = "Senin";
            } elseif ($dayB == "Tuesday") {
                $dayB = "Selasa";
            } elseif ($dayB == "Wednesday") {
                $dayB = "Rabu";
            } elseif ($dayB == "Thursday") {
                $dayB = "Kamis";
            } elseif ($dayB == "Friday") {
                $dayB = "Jum'at";
            } elseif ($dayB == "Saturday") {
                $dayB = "Sabtu";
            }

            echo  "
            <tr>
            <td> $x </td>
            <td> $data[tglA] </td>
            <td> $data[hariA] </td>
            <td> $dayA </td>
            <td> $data[tglB] </td>
            <td> $data[hariB] </td>
            <td> $dayB </td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>
