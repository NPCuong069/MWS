<?php

class LogoutAdmin
{
    public function __construct()
    {
        unset($_SESSION['useradmin']); // xóa session user đã tạo khi đăng nhập

    }
}

$logout = new LogoutAdmin();