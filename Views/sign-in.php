<?php
    require_once '../until.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <div>
        <form action="top.php" method="post">
            <h1>ログイン</h1>

            <?php if (isset($error['msg'])) : ?>
                <p>
                    <?php echo $error['msg']; ?>
                </p>
            <?php endif ?>

            <div>
                <input type="email" name="email" placeholder="xxxxxxxxxxxx@co.jp"><br>
                <input type="text" name="password" placeholder="*********"><br>
            </div>

            <?php if (isset($error['email'],$error['password'])) : ?>
                <p>
                    <?php echo $error['email']."<br>"; ?>
                    <?php echo $error['password']; ?>
                </p>
            <?php endif ?>


            <div>
                <button type="submit">ログイン</button>
            </div>
            <p>
                <a href="sign-up.php">会員登録する</a>
            </p>
        </form>
    </div>
</body>
</html>