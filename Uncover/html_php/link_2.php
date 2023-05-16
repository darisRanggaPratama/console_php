<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link 2</title>
</head>

<body>
    <!-- Alterntif Penulisan -->
    <?php
    echo "\n<a href=home.php>Home</a>";
    echo "\n<a href='home.php'>Home</a>";
    echo "\n<a href=\"home.php\">Home</a>";
    echo "\n" . '<a href="link_1.html">Link 1</a>';
    ?>
    <a href="<?php echo "\n" . "home.php"; ?>">
        <?php echo "To Home";
        ?>
    </a>
    <!-- Tag HTML dari Array: PHP -->
    <?php
    include('link_link.php');

    for ($i = 0; $i < count($alamat_link); $i++) {
        echo "<ol>";
        echo "\n<a href='$alamat_link[$i]'>$i $judul_link[$i]</a>";
        echo "</ol>";
    }
    ?>


</body>

</html>
