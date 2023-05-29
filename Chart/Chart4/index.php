<?php
// Koneksi ke database MySQL
$conn = mysqli_connect('localhost', 'rangga', 'rangga', 'test');

// Query untuk mengambil data dari tabel
$query = 'SELECT * FROM kota ORDER BY kota';
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
    <title>Grafik Tiga Garis</title>

    <!-- Load library jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load library Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
                data: <?php echo $data1; ?>,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                pointRadius: 0
            },
            {
                label: 'Medali',
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
