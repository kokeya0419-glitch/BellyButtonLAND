<?php
//XSS対策のメソッド
function h(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//PDO接続のメソッド
function db_open(){
    $user = "phpuser";
    $password = "phpuser"; 
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        //文字化け回避のための一文
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=db_bbland', $user, $password, $opt);
    return $dbh;
}