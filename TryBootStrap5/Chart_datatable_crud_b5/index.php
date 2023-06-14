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
    <!-- Load library Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS Style -->
    <style type="text/css">
        canvas {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 100%;
            max-width: 1500px;
        }

        .txt-blue {
            color: blue;
        }

        .txt-red {
            color: red;
        }

        .container {
            background-color: white;
            border: 0px;
            padding: 0.4em;
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0.5em;
            width: 100%;
            max-width: 360px;
            display: block;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center">Payroll Pattern</h1>
    <div class="container">
        <form action="index.php" method="GET">
            <div class="row">
                <div class="col" colspan="2">
                    <p style="text-align: center; font-size: 20px; font-weight: bold;">Year</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="year1" class="input-group-text">From</label>
                        <select id="year1" name="year1" class="form-select">
                            <?php
                            // Array: year number
                            $year = array(2021, 2022, 2023, 2024, 2025, 2026);

                            // Display year
                            for ($i = 0; $i < sizeof($year); $i++) {
                                echo "<option class=\"txt-blue\" value=" . $year[$i] . ">$year[$i]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="year2" class="input-group-text">To</label>
                        <select id="year2" name="year2" class="form-select">
                            <?php
                            // Display year
                            for ($i = 0; $i < sizeof($year); $i++) {
                                echo "<option class=\"txt-red\" value=" . $year[$i] . ">$year[$i]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" colspan="2">
                    <p style="text-align: center; font-size: 20px; font-weight: bold;">Month</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="month1" class="input-group-text">From</label>
                        <select id="month1" name="month1" class="form-select">
                            <?php
                            // Array: month text
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
                            // Display month
                            foreach ($month as $key => $value) {
                                echo "<option class=\"txt-blue\" value=" . $key . ">$value</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <label for="month2" class="input-group-text">To</label>
                        <select id="month2" name="month2" class="form-select">
                            <?php
                            // Display month
                            foreach ($month as $key => $value) {
                                echo "<option class=\"txt-red\" value=" . $key . ">$value</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" colspan="2">
                    <div style="text-align: center;">
                        <input style="text-align:center; font-weight: bold;" type="submit" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <!-- Create canvas to display chart -->
    <canvas id="chartContainer"></canvas>

    <!-- Script to create chart -->
    <script type="text/javascript">
        // Get data from PHP (variable)
        let data1 = <?php echo $data1; ?>;
        let data2 = <?php echo $data2; ?>;

        // Array to store label
        let labels = [];

        // Array to store value (curve)
        let values1 = [];
        let values2 = [];

        // Object (data)
        let dataSets = [];

        // Loop data and store into array
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

        // Chart configuration
        let ctx = document.getElementById("chartContainer");
        var chart = new Chart(ctx, {
            type: "scatter",
            data: lableValue,
            options: {
                scales: {
                    y: {
                        // Y axis begun from 0: true/ false
                        beginAtZero: false
                    }
                }
            }
        });
    </script>

    <object data="table.php" height="850px" width="100%">
        Your browser does not support the object tag.
    </object>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>