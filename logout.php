<?php


$page_css = ["./css/login.css"];
include './temp/header.php';
require_once './temp/functions.php';


//セッション内の配列の値を削除
$_SESSION = array();

//セッション情報を破棄
session_destroy();

//トップページへ遷移
?>
<!-- トップページに戻る -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; URL=./main.php">
    <title>ログアウト</title>
</head>

<body class="text-center">
    <p>ログアウトしました。</p>
    <p>3秒後にTOPページへ移動します。</p>
    <p>自動で戻らない場合は<a href="../main.php">ここをクリック</a></p>
</body>


</html>

<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>