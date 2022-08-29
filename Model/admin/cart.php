<?php

class CartModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getCart($cartId)
    {
        $sql = "SELECT * FROM cart WHERE cartId = $cartId";
        $result = $this->db->conn->query($sql);
        $data = $result->fetch_array();

        return $data;
    }
    public function receiveCart($cartId, $adminId)
    {
        $sql = "UPDATE cart SET adminId = '$adminId', cartStatus = 2 WHERE cartId = $cartId";

        return $this->db->conn->query($sql);
    }

    public function deliveCart($cartId)
    {
        $sql = "UPDATE cart SET cartStatus = 3 WHERE cartId = $cartId";
        return $this->db->conn->query($sql);
    }

    public function completeCart($cartId)
    {
        $sql = "UPDATE cart SET cartStatus = 4 WHERE cartId = $cartId";
        return $this->db->conn->query($sql);
    }

    public function refuseCart($cartId)
    {
        $sql = "UPDATE cart SET cartStatus = 5 WHERE cartId = $cartId";
        return $this->db->conn->query($sql);
    }

    public function phoneList()
    {
        $sql = "SELECT * FROM phone";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
}