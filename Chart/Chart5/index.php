<?php
// Koneksi ke database MySQL
$conn = mysqli_connect('localhost', 'rangga', 'rangga', 'test');

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM `kota` ORDER BY `kota`";
$result = mysqli_query($conn, $query);

// Inisialisasi array untuk menampung data
$data1 = array();
$data2 = array();

// Iterasi setiap baris dari hasil query
while ($row = mysqli_fetch_assoc($result)) {
    // Tambahkan data ke array
    $data1[] = $row['atlit'];
    $data2[] = $row['jumlah'];
}

// Encode array ke format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Multi Axis Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        setTimeout(function() {
            location.reload();
        }, 5000);
    </script>
</head>
<body>
<canvas id="myChart"></canvas>
<script>
    // Ambil elemen canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    // Buat data array untuk grafik
    var data = {
        labels: ['Bekasi', 'Bogor', 'Depok', 'Jakarta', 'Tangerang'],
        datasets: [
            {
                label: 'Atlit',
                yAxisID: 'y-axis-1',
                data: <?php echo $data1; ?>,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                pointRadius: 0
            },
            {
                label: 'Medali',
                yAxisID: 'y-axis-2',
                data: <?php echo $data2; ?>,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
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
                    }
                ]
            }
        }
    });
</script>
</body>
</html>
