<?php

class Home
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

        if (isset($_POST['productId'])) {
            if (isset($_SESSION['user'])) {
                if (isset($_SESSION['cart'])) {
                    $productId = $_POST['productId'];
                    $productPrice = $_POST['productPrice'];
                    $cartModel->addToCart($_SESSION['cart'], $productId, 1, 1, $productPrice);
                }
            } else header("Location:./?controller=login");
        }

        require('View/client/pages/home.php');

    }
}