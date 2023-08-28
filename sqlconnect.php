<?php

include_once 'env.php';

function connect()
{
    //env.phpの定数を変数に代入
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charaset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass,[
                //エラーモードを指定、配列をkeyとvalueで返す設定
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $pdo;
        } catch (PDOExeption $e){
            echo '接続に失敗しました'.$e->getMessage();
            exit();
        }

}

?>