<?php
require_once 'DB.php'; 

class Model {
    protected $db;
    protected $stmt;

    public function __construct($db) {
        $this->db = $db;
        
    }

     //一覧
     public function UserList() {
        $db = new DB(); 
        $conn = $db->getConnection(); 

        $List = array(); // 初期化

        $query = "SELECT * FROM users AS u LEFT JOIN companies AS c ON u.company_id = c.company_id"; 

        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $List[] = $row;
            }
        }
        return $List;
    }
}