<?php

class UserCategoryModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
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