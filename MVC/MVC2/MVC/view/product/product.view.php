<?php
class ProductView extends ProductController
{
    public function show()
    {
        // Call function controller product
        $products = $this->getProducts();
        foreach ($products

                 as $product) { ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['stock']; ?></td>
            </tr>
            <?php
        }
    }

    public function find()
    {
        // Call function controller product
        $detailProduct = $this->getProductBy();
        if (empty($detailProduct))  { return; }
        foreach ($detailProduct as $detail) { ?>
            <div>
                <h3><?php echo $detail['name']; ?></h3>
                <p>Harga Rp. <?php echo $detail['price']; ?></p>
                <p>Stok: <?php echo $detail['stock']; ?></p>
            </div>
            <?php
        }
    }
}
?>



