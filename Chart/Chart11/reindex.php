<?php
require_once "connect.php";

// Array untuk menyimpan data
$data1 = array();
while ($row = mysqli_fetch_array($result1)) {
    $data1[] = array(
        'Bulan' => $row['BULAN'],
        'Gaji' => $row['GAJI']
    );
}

$data2 = array();
while ($row = mysqli_fetch_array($result2)) {
    $data2[] = array(
        'Bulan' => $row['BULAN'],
        'Transfer' => $row['TRANSFER']
    );
}

// Encode data ke dalam format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Payroll</title>
    <!-- Load library Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        canvas {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 100%;
            max-width: 1500px;
        }
    </style>

</head>

<body>
    <!-- Buat elemen canvas untuk menampilkan grafik -->
    <canvas id="chartContainer"></canvas>

    <!-- Script untuk membuat grafik -->
    <script type="text/javascript">
        // Ambil data dari variabel PHP
        let data1 = <?php echo $data1; ?>;
        let data2 = <?php echo $data2; ?>;

        // Array untuk menyimpan label
        let labels = [];
        // Array untuk menyimpan value
        let values1 = [];
        let values2 = [];

        // Object
        let dataSets = [];

        // Loop data dan masukkan ke dalam array
        // Format angka: new Intl.NumberFormat("id-ID").format(bilangan)

        data1.forEach(function(datum) {
            labels.push(datum.Bulan);
            // const val = new Intl.NumberFormat("id-ID").format(datum.Gaji);
            values1.push(datum.Gaji);
        });


        data2.forEach(function(datum) {
            // const val = new Intl.NumberFormat("id-ID").format(datum.Transfer);
            values2.push(datum.Transfer);
        });

        const datum = [values1, values2];
        const typeChart = [{
                type: 'line',
                labels: 'Gaji'
            },
            {
                type: 'bar',
                labels: 'Transfer'

            }
        ];

        const typeColor = [{
                border: 'rgb(255, 99, 132)',
                background: 'rgba(255, 99, 132, 0.2)'
            },
            {
                border: 'rgb(100, 99, 132)',
                background: 'rgba(100, 99, 132, 0.2)'
            }
        ];

        // console.log(labels);
        for (let i = 0; i < 2; i++) {
            dataSets.push({
                type: typeChart[i].type,
                label: typeChart[i].labels,
                data: datum[i],
                borderColor: typeColor[i].border,
                backgroundColor: typeColor[i].background,
                tension: 0.1
            })
        }

        // console.log(dataSets);
        const objLableValue = {
            labels: labels,
            datasets: dataSets

        };

        // Konfigurasi Grafik
        let ctx = document.getElementById("chartContainer");
        var chart = new Chart(ctx, {
            type: "bar",
            data: objLableValue,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>