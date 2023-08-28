<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録画面</title>
</head>
<body>
    <div>
        <form action="register.php" method="post">
            <h1>ユーザー登録</h1>
            <div>
                <input type="text" name="name" placeholder="島根 太郎"><br>
                <input type="email" name="email" placeholder="xxxxxxxxxxxx@co.jp"><br>
                <input type="text" name="password" placeholder="*********"><br>
            </div>
            <div>
                <button type="submit">登録する</button>
            </div>
            <p>
                <a href="sign-in.php">ログインする</a>
            </p>
        </form>
    </div>
</body>
</html>