<?php
require_once "model.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Payroll</title>
    <!-- Load library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        // Array untuk menyimpan value (kurva)
        let values1 = [];
        let values2 = [];

        // Object (data)
        let dataSets = [];

        // Loop data dan masukkan ke dalam array
        data1.forEach(function(datum) {
            labels.push(datum.Bulan);
            values1.push(datum.Gaji);
        });

        data2.forEach(function(datum) {
            values2.push(datum.Transfer);
        });

        const allValue = [values1, values2];
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

        for (let i = 0; i < 2; i++) {
            dataSets.push({
                type: typeChart[i].type,
                label: typeChart[i].labels,
                data: allValue[i],
                borderColor: typeColor[i].border,
                backgroundColor: typeColor[i].background,
                fill: true,
                tension: 0.1
            })
        }

        const lableValue = {
            labels: labels,
            datasets: dataSets
        };

        // Konfigurasi Grafik
        let ctx = document.getElementById("chartContainer");
        var chart = new Chart(ctx, {
            type: "scatter",
            data: lableValue,
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</body>

</html>
