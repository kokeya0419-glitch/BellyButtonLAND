<?php
session_start();

//セッション内の配列の値を削除
$_SESSION = array();

//セッション情報を破棄
session_destroy();

//トップページへ遷移
header('Location:./');