<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "rangga", "rangga", "test");

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM kota";
$result = mysqli_query($conn, $query);

// Array untuk menyimpan data
$data = array();
while($row = mysqli_fetch_array($result)) {
    $data[] = array(
        'label' => $row['kota'],
        'value' => $row['atlit']
    );
}

// Encode data ke dalam format JSON
$data = json_encode($data);
?>

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
    data.forEach(function(datum) {
        labels.push(datum.label);
        values.push(datum.value);
    });

    // Buat grafik
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Atlit',
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

