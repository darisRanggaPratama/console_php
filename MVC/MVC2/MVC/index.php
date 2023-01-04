<?php
require_once "connection.php";
require_once "./model/product.model.php";
require_once "./controller/product.controller.php";
require_once "./view/product/product.view.php";
$products = new ProductView();
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
    <title>MVC</title>
</head>
<body>
<!-- Navigation Bar -->
<?php require_once "./view/utils/navbar.utils.php"; ?>

<!-- Mencari Produk via URL -->
<?php $products->find(); ?>

<!-- Semua Product -->
<table>
    <caption></caption>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>STOCK</th>
    </tr>
    <?php $products->show(); ?>
</table>
<!-- FOOTER -->
</body>
</html>

