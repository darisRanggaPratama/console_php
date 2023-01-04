<?php

class ProductModel extends Connection
{
//    protected $name;
//    protected $price;
//    protected $stock;

    protected function findAll()
    {
        $sql = "SELECT * FROM product";
        // Call function dari default mysql
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                $product[] = $data;            }
        }
        return $product;
    }

    protected function findOne($id){
        $sql = "SELECT * FROM product WHERE id = ".$id;
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while($data = mysqli_fetch_assoc($result)) {
                $product[] = $data;
            }
            return $product;
        }
    }
}
