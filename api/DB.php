<?php
class DB {
    public $servername = 'localhost';    // ホスト名
    public $username = 'localhost';     // ユーザー名

    public $password = '';         // パスワード（必要に応じて設定してください

    public $dbname = 'client_db';  // データベース名

    public $conn;


    public function __construct() {
        // データベースに接続
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // 接続エラーチェック
        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->conn->connect_error);
        }

        echo ""; // 接続成功のメッセージ（開発時のみ推奨）
    }

    public function getConnection() {
        return $this->conn;  // MySQLi オブジェクトのゲッターメソッド
    }
    
}