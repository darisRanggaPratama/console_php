<?php
require_once 'ProductController.php';
require_once 'ProductModel.php';

$controller = new ProductController();
$controller->view(1);
$controller->view(2);
$controller->view(3);
