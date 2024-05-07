<?php
//DB接続用のファイルを呼び出す。
require 'DB.php';

//会社のデータ処理を記載

class Companies extends Model
{
    protected function getValue() {
        return "Companies";
    }

    public function prefixValue($prefix) {
        return "{$prefix}Companies";
    }
}