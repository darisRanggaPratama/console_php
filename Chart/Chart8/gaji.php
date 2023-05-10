<?php

// Koneksi Ke Database
$koneksi = mysqli_connect("localhost", "rangga", "rangga", "test");

//Inisialisasi nilai variabel awal
$nama_bln = "";
$total = null;

//Query SQL
$sql = "SELECT bln FROM gaji22";
$hasil = mysqli_query($koneksi, $sql);

while ($data = mysqli_fetch_array($hasil)) {
    //Mengambil nilai nama_jurusan dari database
    $month = $data['bln'];
    $nama_bln .= "'$month'" . ", ";
}

//Query SQL
$sql1 = "SELECT gaji FROM gaji22";
$hasil1 = mysqli_query($koneksi, $sql1);

while ($data = mysqli_fetch_array($hasil1)) {
    //Mengambil nilai jumlah_siswa dari database
    $salary = $data['gaji'];
    $total .= "'$salary'" . ", ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belajar Membuat Chart</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>-->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>-->
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;


        }
    </style>
</head>

<body>

    <div style="width: 50%;height: 50%" class="center">
        <canvas id="myChart"></canvas>
    </div>
    <div style="width: 50%;height: 50%" class="center">
        <canvas id="chartMe"></canvas>
    </div>


</body>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $nama_bln; ?>],
            datasets: [{
                label: 'Data Gaji 2023',
                data: [<?php echo $total; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(171, 178, 185, 0.2)',
                    'rgba(142, 68, 173, 0.2) ',
                    'rgba(248, 196, 113, 0.2)',
                    'rgba(22, 160, 133, 0.2)',
                    'rgba(148, 49, 38, 0.2)',
                    'rgba(151, 154, 154, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(171, 178, 185,1)',
                    'rgba(142, 68, 173, 1)',
                    'rgba(248, 196, 113, 1)',
                    'rgba(22, 160, 133, 1)',
                    'rgba(148, 49, 38, 1)',
                    'rgba(151, 154, 154, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script type="text/javascript">
    var ctx = document.getElementById('chartMe').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_bln; ?>],
            datasets: [{
                label: 'Data Gaji 2023',
                data: [<?php echo $total; ?>],
                backgroundColor: [                    
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(171, 178, 185, 0.2)',
                    'rgba(142, 68, 173, 0.2) ',
                    'rgba(248, 196, 113, 0.2)',
                    'rgba(22, 160, 133, 0.2)',
                    'rgba(148, 49, 38, 0.2)',
                    'rgba(151, 154, 154, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(171, 178, 185,1)',
                    'rgba(142, 68, 173, 1)',
                    'rgba(248, 196, 113, 1)',
                    'rgba(22, 160, 133, 1)',
                    'rgba(148, 49, 38, 1)',
                    'rgba(151, 154, 154, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</html>
<!--
Link: https://www.belajarwithib.my.id/2021/02/membuat-grafik-batang-php-chartjs.html

-->
