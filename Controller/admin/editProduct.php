<?php

class EditProduct {
    public function __construct()
    {
        require_once('../../Model/admin/product.php');
        require_once('../../Model/admin/phone.php');
        require('../../Model/admin/category.php');
        $productModel = new ProductModel();
        $phoneModel = new PhoneModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->categoryList();
        $phones = $phoneModel->phoneList();
        $path_image = '../../Public/client/img/products/';
        $selectedPhones = [];
        if (isset($_GET['productId'])) {
            $productId = $_GET['productId'];
            $productOld = $productModel->getProduct($productId);
            $selectedPhones = $phoneModel->getPhoneByProduct($productId);
            if (isset($_POST['editProduct'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $category = $_POST['category'];
                $selectedPhones=$_POST['selectedPhones'];
                $phoneModel->deleteProductForPhone($productId);
                $productModel->editProduct($productId,$name, $price, $quantity,$selectedPhones,$category);
                if($_FILES['image']['size']!=0){
                    $imageName = $name .'_'.$productId.'.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES["image"]["tmp_name"],
                        $path_image . $imageName);
                    $productModel->editImage($productId,$imageName);
                }

                $_SESSION['thongbao'] = '* Thêm thành công';
                header('Location: ?controller=listProduct');
            }

            require('../../View/admin/pages/product/edit.php');
        }
    }
}