<?php
include('connect.php');

$data_barang = mysqli_query($connect, "SELECT produk FROM db_store GROUP BY produk");

$penjualan = mysqli_query($connect, "SELECT SUM(jumlah) AS sold FROM db_store GROUP BY produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Penjualan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.js" text="text/javascript"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>My Store: Grafik Penjualan</h1>
    <div style="text-align: center;">
        <canvas id="penjualan">

        </canvas>
    </div>

    <script>
        let ctx = document.getElementById("penjualan").getContext('2d');
        let mychart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    while ($row = mysqli_fetch_array($data_barang)) {
                        echo '"'.$row['produk'] .'",';
                    }
                    ?>
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        <?php
while ($row = mysqli_fetch_array($penjualan)) {
    echo '"' . $row['sold'] . '",';
}
                        ?>
                    ],
                    backgroundColor: [
                        '#641E16', '#943126', '#76448A', '#7D3C98', '#2980B9', '#5DADE2',
                        '#76D7C4', '#7D6608', '#9C640C', '#CA6F1E', '#707B7C', '#566573'
                    ],
                    borderWidth: 1
                }]
            },
            Options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    </script>
</body>

</html>
