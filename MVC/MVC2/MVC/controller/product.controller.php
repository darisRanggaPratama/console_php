<?php
class ProductController extends ProductModel
{
    public function getProducts(){
        // Call Query function in Product Model
        return $this->findAll();
    }

    public function getProductBy(){
        if (!isset($_GET['id'])){ return; }

        $onlyId = preg_replace('/\D/', '', $_GET['id']);
        if ($onlyId !== "") {
            return $this->findOne($_GET['id']);
        }
    }
}
