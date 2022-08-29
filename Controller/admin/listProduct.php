<?php

class ListProduct {
    public function __construct()
    {
        require_once('../../Model/admin/product.php');
        $productModel = new ProductModel();
        $all = $productModel->productList();
        $perPage = 5;
        $number_of_result = count($all);
        $numOfPage = ceil($number_of_result/$perPage);
        if (!isset ($_GET['page']) ) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $page_first_result = ($page-1) * $perPage;
        $products = $productModel->productListPage($page_first_result,$perPage);
        require('../../View/admin/pages/product/list.php');
    }
}