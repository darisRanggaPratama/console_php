<?php
require_once "connect.php";

// Array untuk menyimpan data
$data1 = array();
while ($row = mysqli_fetch_array($result1)) {
    $data1[] = array(
        'Bulan' => $row['BULAN'],
        'Gaji' => $row['GAJI']
    );
}

$data2 = array();
while ($row = mysqli_fetch_array($result2)) {
    $data2[] = array(
        'Bulan' => $row['BULAN'],
        'Transfer' => $row['TRANSFER']
    );
}

// Encode data ke dalam format JSON
$data1 = json_encode($data1);
$data2 = json_encode($data2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Payroll</title>
    <!-- Load library Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        canvas {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 100%;
            max-width: 1500px;
        }
    </style>

</head>

<body>
    <!-- Buat elemen canvas untuk menampilkan grafik -->
    <canvas id="chartContainer"></canvas>

    <!-- Script untuk membuat grafik -->
    <script type="text/javascript">
        // Ambil data dari variabel PHP
        let data1 = <?php echo $data1; ?>;
        let data2 = <?php echo $data2; ?>;

        // Array untuk menyimpan label
        let labels = [];
        // Array untuk menyimpan value
        let values1 = [];
        let values2 = [];


        // Loop data dan masukkan ke dalam array
        data1.forEach(function(datum) {
            labels.push(datum.Bulan);
            values1.push(datum.Gaji);
        });

        data2.forEach(function(datum) {
            values2.push(datum.Transfer);
        });

        // Konfigurasi Grafik
        let ctx = document.getElementById("chartContainer");
        var chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                        type: "bar",
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1,
                        label: "Netto",
                        data: values2
                    },
                    {
                        type: "line",
                        label: "Gaji",
                        data: values1,
                        lineTension: 0.1,
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            }
        });
    </script>
</body>
</html>
