<?php
// Fungsi untuk autoload setiap class. Class & nama file harus sama
spl_autoload_register(function ($class)
{
    require_once __DIR__ . '/library/' . $class . '.php';
}
);

$controller = new ProductController();
$controller->view(1);
$controller->view(2);
$controller->view(3);
