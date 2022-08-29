<?php

class UserProductModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }
    public function productList()
    {
        $sql = "SELECT * FROM product";
        $result = $this->db->conn->query($sql);
        $list = array();
        while ($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function getProduct($productId)
    {
        $sql = "SELECT * FROM product WHERE productId = $productId";
        $result = $this->db->conn->query($sql);
        $data = $result->fetch_array();
        return $data;
    }
    public function productsByCategory($categoryId)
    {
        $sql = "SELECT * FROM product WHERE categoryId='$categoryId'";
        $result = $this->db->conn->query($sql);
        $list = array();
        while ($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function productsByName($name)
    {
        $sql = "SELECT * FROM product WHERE productName LIKE '%$name%'";
        $result = $this->db->conn->query($sql);
        $list = array();
        while ($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function productsForHome($categoryId)
    {
        $sql = "SELECT * FROM product WHERE categoryId='$categoryId' LIMIT 4 ";
        $result = $this->db->conn->query($sql);
        $list = array();
        while ($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }

}