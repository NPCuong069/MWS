<?php

class Search
{
    public function __construct()
    {
        require_once('Model/client/product.php');
        require_once('Model/client/category.php');
        require_once('Model/client/cart.php');
        $productModel = new UserProductModel();
        $categoryModel = new UserCategoryModel();
        $cartModel = new UserCartModel();
        $categories = $categoryModel->categoryList();
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $products = $productModel->productsByName($search);
        }
        require('View/client/pages/search.php');

    }
}