<?php

class Database
{
    public $conn = NULL;
    private $server = 'localhost';
    private $dbName = 'msw';
    private $user = 'root';
    private $password = 'Bunoi123';

    // Hàm kết nối CSDL
    public function connect()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

        if ($this->conn->connect_error) {
            printf($this->conn->connect_error);
            exit();
        }

        $this->conn->set_charset("utf8");
    }

    public function closeDatabase()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}