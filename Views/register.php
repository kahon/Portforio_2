<?php

require_once '../Models/users.php';

//エラーメッセージを連想配列に
$err = [];

// フォームに文字が入力されているか確認を行い、入力されていない場合$eにためる
if(!$name = filter_input(INPUT_POST, 'name')) {
    $err[] = '名前を入力してください';
}
if(!$email = filter_input(INPUT_POST, 'email')) {
    $err[] = 'メールアドレスを入力してください';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
    $err[] = 'パスワードを入力してください';
}


if(count($err) === 0) {
    //ユーザーを登録する処理($user = new createUser();でもできそう)
   //新規登録のSQLクエリを作成
    $hasCreated = Users::creatUser($_POST);
    
    if (!$hasCreated) {
        $err[] = '登録に失敗しました';
    }

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録結果画面</title>
</head>
<body>
    <?php if(count($err) > 0) : ?>
        <?php foreach($err as $e) :?>
            <p><?php echo $e ?></p>
        <?php endforeach?>
    <?php else : ?>
        <p>登録が完了しました。</p>
    <?php endif ?>
    <a href="sign-up.php">会員登録画面に戻る</a>
</body>
</html>