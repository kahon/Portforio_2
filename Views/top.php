<?php

require_once '../Models/users.php';

session_start();

//エラーメッセージを連想配列に
$err = [];

// フォームに文字が入力されているか確認を行い、入力されていない場合$eにためる
if(!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを入力してください';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを入力してください';
}

if(count($err) > 0) {
    //エラーがあったとき（ログイン画面に遷移）
    $_SESSION = $err; //$_SETTIONは連想配列なので$errが連想配列になってはいるようにする
    header('Location: sign-in.php');
    return;

} else {
    //ログインに成功したとき
    $result = Users::login($email, $password);

    //ログインに失敗したとき
    if(!$result) {
        header('Location: sign-in.php');
        return;
    }
}

echo 'ログインに成功しました。'

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
        <p></p>
    <?php endif ?>
    <a href="sign-in.php">ログイン画面に戻る</a>
</body>
</html>