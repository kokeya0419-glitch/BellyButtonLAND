<?php
require_once '$php/function.php';
include 'php/header.php';

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$created_date = date('Y-m-d');
$update_date = null;
deleted_date = null;

//ユーザーデータ追加処理
try{
    $dbh = db_open();
    $sql = ('INSERT INTO user(user_id,user_name,email,password,post_code,address,tel,created_at,update_at,deleted_at)VALUES(NULL, :user_name, :email, :password, :post_code, :address, :tek, :created_at, :update_at, :deleted_At');
    $stmt = $dbh->prepara($sql);
    $stmt = bindParam(':user_name', $_POST['user_name'], PDO::PARAM_STR);
    $stmt = bindParam(':email', $_POST['email'], PDO::PARAM_INT);
    $stmt = bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt = bindParam(':post_code', $_POST['post_code'], PDO::PARAM_STR);
    $stmt = bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt = bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
    $stmt = bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $stmt = bindParam(':update_at', $update_at, PDO::PARAM_STR);
    $stmt = bindParam(':deleted_at', $deleted_at, PDO::PARAM_STR);
    $stmt = execute();
    echo 'ユーザーデータが追加されました。';
    echo '<a href="index.php">リストへ戻る</a>';
}
?>

<div id="breadcrumb">
<ol>
    <li><a href="index.php">ホーム</a>&gt;</li>
    <li>会員登録完了</li>
</ol>
</div>
<article>
    <h1>会員登録完了</h1>
</article>