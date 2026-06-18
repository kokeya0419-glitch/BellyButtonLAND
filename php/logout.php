<?php
require_once __DIR__ . '/../temp/functions.php';
include     __DIR__ . '/../temp/header.php';

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
    <meta http-equiv="refresh" content="3; URL=../main.php">
    <title>ログアウト</title>
</head>

<body class="text-center">
    <p>ログアウトしました。</p>
    <p>3秒後にTOPページへ移動します。</p>
    <p>自動で戻らない場合は<a href="../main.php">ここをクリック</a></p>
</body>


</html>

<?php
// ページ内容...
include __DIR__ . '/../temp/footer1.php';
include __DIR__ . '/../temp/footer2.php';