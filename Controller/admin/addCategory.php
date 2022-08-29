<?php

class AddCategory {
    public function __construct()
    {
        require('../../Model/admin/category.php');
        $categoryModel = new CategoryModel();
        $alert = array();

        if (isset($_POST['addCategory'])) {
            $categoryName = $_POST['name'];
            $categoryModel->addCategory($categoryName);
            $alert['success'] = 'Thêm thành công';

        }
        require('../../View/admin/pages/category/add.php');
    }
}