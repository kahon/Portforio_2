<?php

require_once '../sqlconnect.php';

class Users {
    /**
     * ユーザーを登録する
     *
     * @param array $data
     * @return bool $result //true or folse
     */
    public static function creatUser($data)
    {
        //新規登録のSQLクエリを作成
        $query = 'INSERT INTO users (name, email, password) VALUES (?,?,?)';

        //パスワードをハッシュ値に変換
        //ユーザーデータを配列に入れる
        $array = [];
        $array[] = $data['name'];
        $array[] = $data['email'];
        $array[] = password_hash($data['password'], PASSWORD_DEFAULT); //値が正しいか

        //try {
            $statement = connect()->prepare($query);
            $result = $statement->execute($array);
            return $result;
        //} catch (\Exception $e) {
        //    return $result;
        //}
    }

    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function login(string $email,string $password)
    {
        
    }
}