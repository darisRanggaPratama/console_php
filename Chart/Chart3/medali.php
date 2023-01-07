<?php
require_once "koneksi.php";

// Array untuk menyimpan data
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
        'kota' => $row['kota'],
        'medali' => $row['jumlah']
    );
}

// Encode data ke dalam format JSON
$data = json_encode($data);
?>

<!-- Load library jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load library Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- Buat elemen canvas untuk menampilkan grafik -->
<canvas id="chartContainer"></canvas>

<!-- Script untuk membuat grafik -->
<script type="text/javascript">
    // Ambil data dari variabel PHP
    var data = <?php echo $data; ?>;

    // Array untuk menyimpan label
    var labels = [];
    // Array untuk menyimpan value
    var values = [];


    // Loop data dan masukkan ke dalam array
    data.forEach(function (datum) {
        labels.push(datum.kota);
        values.push(datum.medali);

    });

    // Buat grafik
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Medali',
                data: values,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
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

