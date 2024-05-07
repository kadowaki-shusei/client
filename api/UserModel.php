<?php
require_once 'DB.php'; 

class UserModel {
    //登録
    public function insert($data) {
        $db = new DB(); 
        $conn = $db->getConnection(); 

        $stmt = $conn->prepare("INSERT INTO users (name, kana, mail, tel, gender, birthday, company_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssisi', $data['name'], $data['kana'], $data['mail'], $data['tel'], $data['gender'], $data['birthday'], $data['company_id']);

        $responseData = array();
        if ($stmt->execute()) {
            $responseData['success'] = 0; 
        } else {
            $responseData['success'] = 2; 
            $responseData['error'] = $conn->error;
        }

        $stmt->close();
        
        return $responseData;
    }

    //検索
    public function search($data) {
        $db = new DB(); 
        $conn = $db->getConnection(); 

        $List = array(); // 初期化

        

        $query = "SELECT * FROM users AS u LEFT JOIN companies AS c ON u.company_id = c.company_id";
        $where = "";
        // 名前
        if ($data['name'] !== '') {
            $where .= " name LIKE '%{$data['name']}%'";
        }
        // かな
        if ($data["kana"] !== "") {
            $where .= $where !== "" ? " AND " : "";
            $where .= " kana LIKE '%{$data['kana']}%'";
        }
        // 性別
        if ($data["gender"] !== "all") {
            $where .= $where !== "" ? " AND " : "";
            $where .= " gender = {$data['gender']}";
        }

        // 生年月日
        if ($data["first_birthday"] !== "" && $data["last_birthday"] !== "") {
            $where .= $where !== "" ? " AND " : "";
            $where .= " birthday BETWEEN '{$data['first_birthday']}' AND '{$data['last_birthday']}'";
        }

        // 所属会社
        if ($data["company_id"] !== "all") {
            $where .= $where !== "" ? " AND " : "";
            $where .= " company_id = {$data['company_id']}";
        }


        if ($where !== '') {
            $query .= " WHERE" . $where;
        }


   
        $List = array();
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $List[] = $row;
            }
            
        }
        //var_dump($List);
        return $List;          

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

    //編集初期データ
    public function detail($data) {
        $db = new DB(); 
        $conn = $db->getConnection(); 

        $List = array(); // 初期化

        $query = "SELECT name, kana, mail, tel, gender, birthday, company_id FROM users WHERE id = '{$data['id']}' "; 

        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $List[] = $row;
            }
        }
        return $List;

    }

    //編集
    public function edit($data) {
        $db = new DB(); 
        $conn = $db->getConnection(); 

        $stmt = $conn->prepare("UPDATE users SET name = ?, kana = ?, mail = ?, tel = ?, gender = ?, birthday = ?, company_id = ? WHERE id = ?");
        $stmt->bind_param("ssssisii", $data['name'], $data['kana'], $data['mail'], $data['tel'], $data['gender'], $data['birthday'], $data['company_id'], $data['id']);
    // Execute the statement
        

        $responseData = array();
        if ($stmt->execute()) {
            $responseData['success'] = 0; 
        } else {
            $responseData['success'] = 2; 
            $responseData['error'] = $conn->error;
        }

        $stmt->close();
        
        return $responseData;

    
    }

    //削除
    public function delete($id) {
        $db = new DB(); 
        $conn = $db->getConnection(); 
    
        // 削除クエリを準備
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id); // パラメータをバインド
    
        $responseData = array();
        if ($stmt->execute()) {
            // 削除が成功した場合
            $responseData['success'] = 0;
        } else {
            // 削除が失敗した場合
            $responseData['success'] = 2; 
            $responseData['error'] = $conn->error;
        }
    
        $stmt->close(); // ステートメントを閉じる
    
        return $responseData;
    }

}

