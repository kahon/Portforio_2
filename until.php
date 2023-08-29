<?php

//セッションスタート
session_start();

$error = $_SESSION;

//配列初期化してセッションの削除
$_SESSION = array();
session_destroy();

?>