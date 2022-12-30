<html><head><style>
        body {
            background-color: white;
        }
        .bola {
            width: 50px;
            height: 50px;
            border-radius: 25px;
            position: absolute;
        }
    </style>
    <script>
        setTimeout(function() {
            location.reload();
        }, 1000);
    </script>
</head><body>
<?php
$warna = array("#808080", "#FF4500", "#008000", "#0000FF", "#FFFF00", "#00BFFF", "#800080", "#D2691E");
$jumlah_bola = 10;

for ($i = 1; $i <= $jumlah_bola; $i++) {
    $random_warna = array_rand($warna, 1);
    $random_posisi_x = rand(0, 100);
    $random_posisi_y = rand(0, 100);
    echo "<div class='bola' style='background-color: $warna[$random_warna];
 top: $random_posisi_y%; left: $random_posisi_x%;'></div>";
}
?>
</body></html>
