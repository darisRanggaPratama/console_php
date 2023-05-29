<?php
require_once "koneksi.php";

// Array untuk menyimpan data
$data1 = array();
while ($row = mysqli_fetch_array($result1)) {
    $data1[] = array(
        'kota' => $row['kota'],
        'medali' => $row['jumlah']
    );
}

$data2 = array();
while ($row = mysqli_fetch_array($result2)) {
    $data2[] = array(
        'kota' => $row['kota'],
        'atlit' => $row['atlit']
    );
}

// Encode data ke dalam format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);

?>

<!-- Load library Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- Buat elemen canvas untuk menampilkan grafik -->
<canvas id="chartContainer"></canvas>

<!-- Script untuk membuat grafik -->
<script type="text/javascript">
    // Ambil data dari variabel PHP
    var data1 = <?php echo $data1; ?>;
    var data2 = <?php echo $data2; ?>;

    // Array untuk menyimpan label
    var labels = [];
    // Array untuk menyimpan value
    var values1 = [];
    var values2 = [];


    // Loop data dan masukkan ke dalam array
    data1.forEach(function(datum) {
        labels.push(datum.kota);
        values1.push(datum.medali);
    });

    data2.forEach(function(datum) {
        values2.push(datum.atlit);
    });

    // Buat grafik
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Medali',
                    data: values1,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                },
                {
                    label: 'atlit',
                    data: values2,
                    backgroundColor: 'rgba(50, 50, 50, 0.2)',
                    borderColor: 'rgba(50, 50, 50, 1)',
                    borderWidth: 2
                }
            ],
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