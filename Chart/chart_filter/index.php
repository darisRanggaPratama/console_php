<?php
include 'proses.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="padding:100px">
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        
        let gaji = JSON.parse('<?= $gaji ?>');
        console.log(gaji);


        $(document).ready(function () {
            // Ambil elemen canvas
            var ctx = $("#myChart");

            // Membuat grafik dengan Chart.js
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                            label: 'Sales',
                            data: [120, 200, 150, 300, 180],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Buy',
                            data: [20, 50, 30, 40, 55],
                            backgroundColor: 'rgba(75, 192, 180, 0.2)',
                            borderColor: 'red',
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>