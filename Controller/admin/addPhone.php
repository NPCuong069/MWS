<?php

class AddPhone {
    public function __construct()
    {
        require('../../Model/admin/phone.php');
        $productModel = new PhoneModel();
        $alert = array();

        if (isset($_POST['addPhone'])) {
            $phoneName = $_POST['name'];
                $productModel->addPhone($phoneName);
                $alert['success'] = 'Thêm thành công';

        }
        require('../../View/admin/pages/phone/add.php');
    }
}