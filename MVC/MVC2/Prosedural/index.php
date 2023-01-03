<?php
require_once 'db.php';
$query = "SELECT * FROM tanggal";
$db = $connect->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th, td {
            border: 1px solid black;
            border-radius: 10px;
            text-align: center;
        }
    </style>
    <title>Procedural</title>

</head>
<body>
<table>
    <caption>Selisih Tanggal</caption>
    <tr>
        <th>NO</th>
        <th>Awal</th>
        <th>Akhir</th>
    </tr>

    <?php
    $y = 1;
    while ($column = mysqli_fetch_assoc($db)) { ?>
        <tr>
            <td><?php echo $y++; ?></td>
            <td><?php echo $column["tglA"]; ?></td>
            <td><?php echo $column["tglB"]; ?></td>
        </tr>
    <?php } ?>

</table>
</body>
</html>
