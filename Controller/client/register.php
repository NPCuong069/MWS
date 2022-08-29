<?php

class Register
{
    public function __construct()
    {
        require_once('Model/client/UserModel.php');
        if (!empty($_SESSION['useradmin'])) {
            header('Location: View/admin');
        } else if (!empty($_SESSION['user'])) {
            header('Location: ./');
        } else {
            $userModel = new UserModel();
            if(isset($_POST["register"])){
                $userName = $_POST["username"];
                $password = md5(md5($_POST['password']));
                $fullName = $_POST["fullName"];
                $userModel->signup($userName,$password,$fullName);
                header("Location:./");
            }
            require('View/client/pages/register.php');
        }
    }
}