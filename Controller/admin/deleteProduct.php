<?php

class DeleteProduct {
    public function __construct()
    {
        require_once('../../Model/admin/product.php');

        $productModel = new ProductModel();

        if (isset($_GET['productId'])) {
            $productId = $_GET['productId'];
            $productModel->deleteProduct($productId);

            header('Location: ?controller=listProduct');
        }
    }
}