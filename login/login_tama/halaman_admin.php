<?php
session_start();

if ($_SESSION['status'] != "sudah_login") {
        header("location:login.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>
        <h1>Urra! Selamat datang : <?php echo $_SESSION['nama']; ?></h1>
        <br>
        <a href="logout.php">Logout</a>
    </body>
</html>
