<?php

// Koneksi Ke Database
$koneksi = mysqli_connect("localhost", "rangga", "rangga", "test");

//Inisialisasi nilai variabel awal
$nama_jur = "";
$total = null;

//Query SQL
$sql = "SELECT jurusan FROM jurusan GROUP BY id";
$hasil = mysqli_query($koneksi, $sql);

while ($data = mysqli_fetch_array($hasil)) {
    //Mengambil nilai nama_jurusan dari database
    $jur = $data['jurusan'];
    $nama_jur .= "'$jur'" . ", ";
}

//Query SQL
$sql1 = "SELECT siswa FROM jurusan GROUP BY jurusan";
$hasil1 = mysqli_query($koneksi, $sql1);

while ($data = mysqli_fetch_array($hasil1)) {
    //Mengambil nilai jumlah_siswa dari database
    $jumlah = $data['siswa'];
    $total .= "'$jumlah'" . ", ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belajar Membuat Chart</title>
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            labels: [<?php echo $nama_jur; ?>],
            datasets: [{
                label: '# Jumlah Siswa',
                data: [<?php echo $total; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
            labels: [<?php echo $nama_jur; ?>],
            datasets: [{
                label: ['# Jumlah Siswa', 'TI'],
                data: [<?php echo $total; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
