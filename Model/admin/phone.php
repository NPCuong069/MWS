<?php

class PhoneModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function addPhone($phoneName)
    {
        $sql = "INSERT INTO phone (phoneName)
							VALUES ('$phoneName')";
        $this->db->conn->query($sql);
    }
    public function getPhone($phoneId)
    {
        $sql = "SELECT * FROM phone WHERE phoneId = $phoneId";
        $result = $this->db->conn->query($sql);
        $data = $result->fetch_array();

        return $data;
    }
    public function editPhone($phoneId, $name)
    {
        $sql = "UPDATE phone SET phoneName = '$name' WHERE phoneId = $phoneId";

        return $this->db->conn->query($sql);
    }
    public function getPhoneByProduct($productId){
        $sql = "SELECT * FROM productforphone WHERE productId ='$productId'";
        $result = $this->db->conn->query($sql);
        $list = array();
        while($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    public function deleteProductForPhone($productId){
        $sql = "DELETE FROM productforphone WHERE productId ='$productId'";
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