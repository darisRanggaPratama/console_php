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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 
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

        form {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 100%;
            max-width: 200px;
        }

        .txt-blue{
            color:blue;
        }

        .txt-red{
            color:red;
        }
    </style>
</head>

<body>
   
    <form action="index.php" method="GET">
        <p style="text-align: center; font-size: 20px; font-weight: bold;">Tahun</p>
        <div class="input-group mb-3">
        <label for="tahun1" class="input-group-text">From</label>
        <select id="tahun1" name="thn1" class="form-select">
            <?php
            $year = array(2021, 2022, 2023, 2024, 2025);


            for ($i = 0; $i < sizeof($year); $i++) {
                echo "<option class=\"txt-blue\" value=" . $year[$i] . ">$year[$i]</option>";
            }
            ?>

        </select>
        </div>
        <div class="input-group mb-3">
        <label for="tahun2" class="input-group-text">To</label>
        <select id="tahun2" name="thn2" class="form-select">
            <?php
            for ($i = 0; $i < sizeof($year); $i++) {
                echo "<option class=\"txt-red\" value=" . $year[$i] . ">$year[$i]</option>";
            }
            ?>

        </select>
        </div>
        <p style="text-align: center; font-size: 20px; font-weight: bold;">Bulan</p>
        <div class="input-group mb-3">
        <label for="bulan" class="input-group-text">From</label>
        <select id="bulan1" name="bln1" class="form-select">
            <?php
            $month = array(
                "01" => "January",
                "02" => "February",
                "03" => "March",
                "04" => "April",
                "05" => "May",
                "06" => "June",
                "07" => "July",
                "08" => "August",
                "09" => "September",
                "10" => "October",
                "11" => "November",
                "12" => "December"
            );

            foreach ($month as $key => $value) {
                echo "<option class=\"txt-blue\" value=" . $key . ">$value</option>";
            }
            ?>

        </select>
        </div>
        <div class="input-group mb-3">
        <label for="bulan" class="input-group-text">To</label>
        <select id="bulan2" name="bln2" class="form-select">
            <?php
            foreach ($month as $key => $value) {
                echo "<option class=\"txt-red\" value=" . $key . ">$value</option>";
            }
            ?>
        </select>
        </div>
        <br>
        <br>
        <div style="text-align: center;">
            <input style="text-align:center;" type="submit" class="form-control">
        </div>
    </form>
    <br>
    <br>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
     
</body>

</html>