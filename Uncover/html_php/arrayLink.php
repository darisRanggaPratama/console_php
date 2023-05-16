<?php
$pathLink =[
    "home.php", "home2.php", "home3.php", "link_2.php"
];

$titleLink = [
    "universe", "galaxy", "jupiter", "for_link"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Array: Link</title>
</head>
<body>
    <ul>
        <?php
            for ($i = 0; $i < count($pathLink); $i++) {
        ?>
        <li>
            <a href="<?php echo $pathLink[$i]; ?>">
                <?php echo strtoupper($titleLink[$i]); ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</body>
</html>
