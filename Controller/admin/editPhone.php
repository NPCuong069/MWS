<?php

class EditPhone {
    public function __construct()
    {
        require_once('../../Model/admin/phone.php');
        $phoneModel = new PhoneModel();

        if (isset($_GET['phoneId'])) {
            $phoneId = $_GET['phoneId'];
            $phoneOld = $phoneModel->getPhone($phoneId);

            if (isset($_POST['editPhone'])) {
                $name = $_POST['name'];
                $phoneModel->editPhone($phoneId,$name);
                $_SESSION['thongbao'] = '* Thêm thành công';

                header('Location: ?controller=listPhone');
            }

            require('../../View/admin/pages/phone/edit.php');
        }
    }
}