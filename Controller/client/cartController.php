<?php

class cartController {
    public function __construct()
    {
        require('Model/client/cart.php');
        require('Model/client/procedures.php');
        $user = $_SESSION["user"];
        $cartModel = new UserCartModel();
        $proceduresModel = new ProceduresModel();
        $alert = array();
        $cart = $cartModel->getOne($_SESSION["cart"]);
        if($cart[0]["cartStatus"]!=0){
            $cartId = $cartModel->createEmptyCart($user["userId"]);
            $_SESSION['cart'] = $cartId;
            header("Location:./?controller=cartController");
        }
        $products = $proceduresModel->getProducts($_SESSION["cart"]);
        if (isset($_POST['minus'])) {
            $price = $_POST['productPrice'];
            $id = $_POST['productId'];
            $cart = $_SESSION['cart'];
            $cartModel->changeAmount($cart,$id,$price,-1);
            header("Location:./?controller=cartController");

        }
        if (isset($_POST['plus'])) {
            $price = $_POST['productPrice'];
            $id = $_POST['productId'];
            $cart = $_SESSION['cart'];
            $cartModel->changeAmount($cart,$id,$price,1);
            header("Location:./?controller=cartController");

        }
        if(isset($_POST['order'])){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $cart = $_SESSION['cart'];
            $cartModel->order($cart,$name,$address,$phone);
            header("Location:./?controller=cartController");
        }
        require('View/client/pages/cart.php');
    }

}