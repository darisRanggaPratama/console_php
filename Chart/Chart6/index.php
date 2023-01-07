<?php
require_once "koneksi.php";
require_once "model.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gaji Tahun 2022</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

</head>
<body>
<canvas id="myChart"></canvas>
<script>
    setTimeout(function () {
        location.reload();
    }, 60000);
</script>
<script>
    // Ambil elemen canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    // Buat data array untuk grafik
    var data = {
        labels: <?php echo $data6; ?>,
        datasets: [
            {
                label: 'Gaji',
                yAxisID: 'y-axis-1',
                data: <?php echo $data1; ?>,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                pointRadius: 0
            },
            {
                label: 'Lembur',
                yAxisID: 'y-axis-2',
                data: <?php echo $data2; ?>,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                pointRadius: 0
            },
            {
                label: 'Tj_Lain',
                yAxisID: 'y-axis-3',
                data: <?php echo $data3; ?>,
                borderColor: 'rgb(66,235,54)',
                backgroundColor: 'rgba(162,252,128,0.2)',
                pointRadius: 0
            },
            {
                label: 'Bruto',
                yAxisID: 'y-axis-4',
                data: <?php echo $data4; ?>,
                borderColor: 'rgb(255,138,0)',
                backgroundColor: 'rgba(255,175,81,0.2)',
                pointRadius: 0
            },
            {
                label: 'Transfer',
                yAxisID: 'y-axis-5',
                data: <?php echo $data5; ?>,
                borderColor: 'rgb(255,234,0)',
                backgroundColor: 'rgba(255,238,91,0.2)',
                pointRadius: 0
            }
        ]
    };

    // Buat grafik
    var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            scales: {
                yAxes: [
                    {
                        id: 'y-axis-1',
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            beginAtZero: true
                        }
                    },
                    {
                        id: 'y-axis-2',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            beginAtZero: true
                        }
                    },
                    {
                        id: 'y-axis-3',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            beginAtZero: true
                        }
                    },
                    {
                        id: 'y-axis-4',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            beginAtZero: true
                        }
                    },
                    {
                        id: 'y-axis-5',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            }
        }
    });
</script>
</body>
</html>
