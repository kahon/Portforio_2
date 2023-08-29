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

        try {
            $statement = connect()->prepare($query);
            $result = $statement->execute($array);
            return $result;
        } catch (\Exception $e) {
            return $result;
        }
    }

    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function login($email,$password)
    {
        // 結果
        $result = false;
        //ユーザーをメールアドレスで検索して取得
        $user = self::getUserByEmail($email);

        if (!$user) {
            $_SESSION['msg'] = 'このメールアドレスは登録されていません';
            return $result; 
        }

        // パスワードの照会
        if (password_verify($password, $user['password'])) {
            // ログイン成功
            session_regenerate_id(true); //セッションハイジャック対策
            $_SESSION['login_user'] = $user;
            $result = true;
            return $result;
        }

        
        $_SESSION['msg'] = 'パスワードが一致しません';
        return $result;

    }

        /**
     * メールアドレスからユーザーを取得
     * @param string $email
     * @return arry|bool $user|false
     */
    public static function getUserByEmail($email)
    {
        // SQL準備
        // SQL実行
        // SQLの結果を返す

        // メールアドレスを配列に入れる
        $query = 'SELECT * FROM users WHERE email = ?';

        $array = [];
        $array[] = $email;

        try {
            $statement = connect()->prepare($query);
            $statement->execute($array);
            // SQLの結果を返す
            $user = $statement->fetch(); //fetch関数はデータを取り出した際に配列の形式を指定できる
            return $user;
        } catch (\Exception $e) {
            return false;
        }
    }

}