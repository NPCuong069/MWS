<?php

class UserCartModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getCartByUser($userId)
    {
        $sql = "SELECT * FROM cart where userId='$userId'";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function getOne($cartId)
    {
        $sql = "SELECT * FROM cart where cartId='$cartId'";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function getNewCart($userId)
    {
        $sql = "SELECT * FROM cart where userId='$userId' and cartStatus=0";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function confirmCart($cartId)
    {
        $sql = "UPDATE cart set cartStatus=1 where cartId='$cartId'";
        $conn = $this->db->conn;
        $result = $this->db->conn->query($sql);
    }
    public function changeAmount($cartId,$productInCartId,$price,$option)
    {
        $sql = "UPDATE cart set cartTotal=cartTotal+$price*$option  where cartId='$cartId'";
        $sql2 = "UPDATE productincart set quantity=quantity+ $option where productInCartId = '$productInCartId'";
        $conn = $this->db->conn;
        $this->db->conn->query($sql);
        $this->db->conn->query($sql2);
    }

    public function order($cartId,$name, $address, $phone)
    {
        $sql = "UPDATE cart set cartName='$name', cartAddress='$address', cartPhone='$phone',cartStatus=1  where cartId='$cartId'";
        $conn = $this->db->conn;
        $this->db->conn->query($sql);
    }

    public function createEmptyCart($userId)
    {
        $sql = "INSERT INTO cart(userId, cartStatus,createdDate, cartTotal) values ('$userId',0,now(),0 ) ";
        $conn = $this->db->conn;
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            return $last_id;
        }
    }

    public function addToCart($cartId, $productId, $quantity, $phoneId, $price)
    {
        $sql0 = "SELECT * FROM productincart WHERE cartId='$cartId' && productId='$productId'";
        $sql = "INSERT INTO productincart(cartId, productId, quantity, phoneId) values ('$cartId','$productId','$quantity','$phoneId') ";
        $sql1 = "UPDATE productincart set quantity = quantity+ 1 where cartId = '$cartId' && productId = '$productId'";
        $sql2 = "UPDATE cart set cartTotal = cartTotal+ '$price' where cartId = $cartId";
        $result=$this->db->conn->query($sql0);
        $data = $result;
        if($data->num_rows==0){
            echo $data->num_rows;
            $this->db->conn->query($sql);
        }
        else {
            $this->db->conn->query($sql1);
        }
        $this->db->conn->query($sql2);
        header('Location:./');
    }

}