<?php
namespace library;

class ProductController
{
    final public function view(string $id = '0'): void
    {
        // retrieve product from database
        if ($id == '1') {
            $product = new ProductModel($id, 'Avanza', 100000000, 'Toyota Avanza');
        } elseif ($id == '2') {
            $product = new ProductModel($id, 'Yamaha', 20000000, 'Yamaha Byson');
        } else {
            $product = new ProductModel(0, 'blank', 0, 'null');
        }
        require 'ProductView.php';
    }
}

