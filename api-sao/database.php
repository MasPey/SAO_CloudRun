<?php

class Database {
    private $host = '34.128.80.1';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'sao';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch(Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

// Set the Content-Type to application/json
header('Content-Type: application/json');

?>
