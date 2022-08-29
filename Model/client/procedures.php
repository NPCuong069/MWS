<?php

class ProceduresModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getProducts($cartId)
    {
        $result = $this->db->conn->query('CALL getCart('.$cartId.')');
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
}