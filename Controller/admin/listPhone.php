<?php

class ListPhone {
    public function __construct()
    {
        require_once('../../Model/admin/phone.php');
        $phoneModel = new PhoneModel();
        $phones = $phoneModel->phoneList();

        require('../../View/admin/pages/phone/list.php');
    }
}