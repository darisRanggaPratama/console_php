<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Animated Table</title>
    <link rel="stylesheet" href="style.css">
    <title>Insert Data Siswa</title>

</head>
<body>
<div class="form-container">
    <form id="dynamic-form" class="animated-form" method="post" action="insert.php">
        <h3>Data Siswa</h3>
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="txtnis" size="10">
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" name="txtnama" size="50">
        </div>
        <div class="form-group">
            <label for="umur">UMUR</label>
            <input type="text" name="txtumur" size="5">
        </div>
        <div class="form-group">
            <label for="gender">GENDER</label>
            <div class="radio-group">
                <input type="radio" name="rdoseks" value="Pria">
                <label for="Pria">Pria</label>
                <input type="radio" name="rdoseks" value="Wanita">
                <label for="gender">Wanita</label>
            </div>
        </div>
        <div class="form-group">
            <div class="radio-group">
                <input type="submit" value="INSERT">
                <input type="reset" value="CANCEL">
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