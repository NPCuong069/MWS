<?php
require 'config/config.php';
class Login
{
    public function __construct()
    {
        require_once('Model/client/cart.php');
        if (!empty($_SESSION['useradmin'])) {
            header('Location: View/admin');
        }
        else if(!empty($_SESSION['user'])) {
            header('Location: ./');
        }
        else {
            $userModel = new UserModel();
            $cartModel = new UserCartModel();
            $error = $this->loginAdmin($userModel, $cartModel);

            require('View/client/pages/login_admin.php');
        }
    }

    public function loginAdmin($userModel, $cartModel)
    {

        $username = $password = $fullName = NULL;
        $error = array();
        $error['username_admin'] = $error['password_admin'] = NULL;

        if (!empty($_POST['login_admin'])) {
            if (empty($_POST['username_admin'])) {
                $error['username_admin'] = '* Cần điền tên đăng nhập';
            } else {
                $username = $_POST['username_admin'];
            }
            if (empty($_POST['password_admin'])) {
                $error['password_admin'] = '* Cần điền mật khẩu';
            } else {
                $password = md5(md5($_POST['password_admin']));
            }

            if ($username && $password) {
                $result = $userModel->login($username, $password);
                $check = $result->num_rows; /*đếm số dòng trong database*/

                if ($check > 0) {
                    $data = $result->fetch_array(); /*lấy dữ liệu tương ứng với username và password nhập*/
                    session_start();
                     /*lưu session*/

                    if ($data['level'] == admin) {
                        $_SESSION['useradmin'] = $data;
                        header('Location: View/admin');
                        session_write_close();
                        exit();
                    } else {
                        $_SESSION['user'] = $data;
                        $cart = $cartModel->getNewCart($data["userId"]);
                        $checkCart = $cart->num_rows;
                        if($checkCart==0){
                            $cartId = $cartModel->createEmptyCart($data["userId"]);
                            $_SESSION['cart'] = $cartId;
                        }
                        else {
                            $oneCart = $cart->fetch_array();
                            $_SESSION['cart']=$oneCart['cartId'];
                        }
                        header('Location: ./');
                        session_write_close();
                    }
                } else {
                    echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                }
            }
        }

        return $error;
    }
}