<?php

class AddProduct
{
    public function __construct()
    {
        require('../../Model/admin/product.php');
        require('../../Model/admin/phone.php');
        require('../../Model/admin/category.php');
        $productModel = new ProductModel();
        $phoneModel = new PhoneModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->categoryList();
        $phones = $phoneModel->phoneList();
        $selectedPhones = [];
        $alert = array();
        if (isset($_POST['addProduct'])) {
            $productName = $_POST['name'];
            $productQuantity = $_POST['quantity'];
            $productPrice = $_POST['price'];
            $selectedPhones = $_POST['selectedPhones'];
            $category = $_POST['category'];
            $productModel->addProduct($productName, $productQuantity, $productPrice, $selectedPhones, $category);
            $alert['success'] = 'Thêm thành công';
        }
        require('../../View/admin/pages/product/add.php');
    }
}