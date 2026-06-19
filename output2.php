<?php
require_once './temp/functions.php';
include './temp/header.php';

//保存ファイル名の指定
$fileName = 'contact.txt';

//ファイルオープン処理
$file = fopen($fileName, 'a');

//ファイルロック
flock($file, LOCK_EX);

//データの取得
$date = [
    $_POST['custemer_name'],
    $_POST['custemer_email'],
    $_POST['tel'],
    $_POST['subject'],
    $_POST['message']
];

//ファイルの書き込み
foreach ($date as $d) {
    fputs($file, $d . "\n");
}
fputs($file, "----------\n");

//ファイルアンロック
flock($file, LOCK_UN);

//ファイルクローズ
fclose($file);
?>

<div id="breadcrumb">
    <ol>
        <li><a href="main.php">ホーム</a></li>
        <li>送信完了</li>
    </ol>
</div>
<article>
    <h1>送信完了</h1>
    <div class="contents">
        <p>データを送信しました</p>
    </div>
</article>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
