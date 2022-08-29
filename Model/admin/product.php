<?php

class ProductModel extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function addProduct($productName, $productQuantity, $productPrice, $selectedPhones, $categoryId)
    {
        $path_image = '../../Public/client/img/products/';
        $sql = "INSERT INTO product (productName, productQuantity, productPrice, categoryId)
							VALUES ('$productName','$productQuantity','$productPrice','$categoryId')";
        $conn = $this->db->conn;
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            $imageName = $productName . '_' . $last_id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["image"]["tmp_name"],
                $path_image . $imageName);
            $this->editImage($last_id, $imageName);
            foreach ($selectedPhones as $phone) {
                $this->addRelation($last_id, $phone);
            }
        }
    }

    public function addRelation($productId, $phoneId)
    {
        $sql = "INSERT INTO productforphone (phoneid, productid)
							VALUES ('$phoneId','$productId')";
        $this->db->conn->query($sql);
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

    public function productListPage($first, $num)
    {
        $sql = "SELECT * FROM product LIMIT " . $first . ',' . $num;
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

    public function editProduct($productId, $name, $price, $quantity, $selectedPhones, $category)
    {
        $sql = "UPDATE product SET productName = '$name', productPrice='$price', productQuantity ='$quantity', categoryId='$category' WHERE productId = $productId";
        $this->db->conn->query($sql);
        foreach ($selectedPhones as $phone) {
            $this->addRelation($productId, $phone);

        }
    }

    public function editImage($productId, $productImage)
    {
        $sql = "UPDATE product SET productImage = '$productImage' WHERE productId = $productId";
        $this->db->conn->query($sql);
    }

    public function deleteProduct($productId)
    {
        $sql = "DELETE FROM product WHERE productId = $productId";

        return $this->db->conn->query($sql);
    }
}