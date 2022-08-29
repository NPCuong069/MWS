<?php

class CategoryModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }
    public function addCategory($categoryName)
    {
        $sql = "INSERT INTO category (categoryName)
							VALUES ('$categoryName')";
        $this->db->conn->query($sql);
    }
    public function categoryList()
    {
        $sql = "SELECT * FROM category";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
}