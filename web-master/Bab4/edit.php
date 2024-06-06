<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Animated Table</title>
    <link rel="stylesheet" href="style.css">
        <title>Ubah Data Siswa</title>
</head>
<body>
<?php
global $connect, $database;
include "connect.php";

$NIS = $_GET['NIS'];
$sql = "SELECT * FROM siswa WHERE Nis=$NIS";
mysqli_select_db($connect, $database) or die("Can not find database");

$query = mysqli_query($connect, $sql) or die("Can not run query");

$row = mysqli_fetch_array($query);

$NIS = $row['Nis'];
$NAMA = $row['Nama'];
$UMUR = $row['Umur'];
$SEX = $row['Seks'];

if ($SEX == "Pria"){
    $P = "checked";
    $W = "";
} else{
    $P = "";
    $W = "checked";
}
?>

<div class="form-container">
    <form id="dynamic-form" class="animated-form" method="post" action="update.php">
        <h3>Data Siswa</h3>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="txtnis" size="10" value="<?php echo "$NIS"; ?>" disabled>
            <input type="hidden" name="NISH" size="10" value="<?php echo "$NIS"; ?>">
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" name="txtnama" size="50" value="<?php echo "$NAMA"; ?>">
        </div>
        <div class="form-group">
            <label for="umur">UMUR</label>
            <input type="text" name="txtumur" size="5" value="<?php echo "$UMUR"; ?>">
        </div>
        <div class="form-group">
            <label for="gender">GENDER</label>
            <div class="radio-group">
                <input type="radio" name="rdoseks" value="Pria" <?php echo "$P"; ?>>
                <label for="Pria">Pria</label>
                <input type="radio" name="rdoseks" value="Wanita" <?php echo "$W"; ?>>
                <label for="gender">Wanita</label>
            </div>
        </div>
        <div class="form-group">
            <div class="radio-group">
                <input type="submit" value="UPDATE">
            </div>
        </div>
        <div class="form-group">
            <?php echo "\t [<a href=view.php> View data</a>]"; ?>
        </div>
    </form>
</div>
<script src="scripts.js"></script>
</body>
</html>
