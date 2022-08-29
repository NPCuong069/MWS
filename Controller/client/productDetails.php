<?php

class ProductDetails {
    public function __construct()
    {
        require('Model/client/product.php');
        $productModel = new UserProductModel();

        require('View/client/pages/details.php');
    }
}