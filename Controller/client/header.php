<?php

class Header
{
    public function __construct()
    {
        require('Model/client/UserModel.php');

        $userModel = new UserModel();
        $error = $this->signUp($userModel);
        $errorLogin = $this->login($userModel);
        if(isset($_POST['search'])){
            $searchValue=$_POST['searchValue'];
            header("Location:./?controller=search&search=$searchValue");
        }
        require('View/client/layouts/header.php');
    }

    public function signUp($userModel)
    {
        $username = $password = $fullName = NULL;
        $error = array();
        $error['username'] = $error['password'] = $error['fullName'] = $error['username_exist'] = NULL;

        if (isset($_POST['signup']))    {
            if (empty($_POST['username'])) {
                $error['username'] = '* Cần điền tên đăng nhập';
            } else {
                $username = $_POST['username'];
            }
            if (empty($_POST['password'])) {
                $error['password'] = '* Cần điền mật khẩu';
            } else {
                $password = md5(md5($_POST['password']));
            }
            if (empty($_POST['fullName'])) {
                $error['fullName'] = '* Cần điền họ tên';
            } else {
                $fullName = $_POST['fullName'];
            }

            if ($username && $password && $fullName) {
                $check = $userModel->checkExists($username);

                if ($check->num_rows > 0) {
                    $error['username_exist'] = '* Tên đăng nhập đã bị trùng';
                } else {
                    $userModel->signup($username, $password, $fullName);
                    echo "<script>alert('đăng ký thành công')</script>";
                }
            }

        }
        return $error;
    }

    public function login($userModel)
    {
        $username = $password = $fullName = NULL;
        $error = array();
        $error['username'] = $error['password'] = NULL;

        if (!empty($_POST['login'])) {
            if (empty($_POST['username'])) {
                $error['username'] = '* Cần điền tên đăng nhập';
            } else {
                $username = $_POST['username'];
            }
            if (empty($_POST['password'])) {
                $error['password'] = '* Cần điền mật khẩu';
            } else {
                $password = md5(md5($_POST['password']));
            }

            if ($username && $password) {
                $result = $userModel->login($username, $password);
                $check = $result->num_rows; /*đếm số dòng trong database*/
                if ($check > 0) {
                    $data = $result->fetch_array(); /*lấy dữ liệu tương ứng với username và password nhập*/
                    session_start();
                    $_SESSION['user'] = $data; /*lưu session*/
                    session_write_close();
                } else {
                    echo "<script>alert('Wrong username or password')</script>";
                }
            }
        }
        return $error;
    }
}

$header = new Header();