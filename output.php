<?php
require_once './temp/functions.php';
include './temp/header.php';

if (!empty($_POST['custemer_name'])) {
    $custemer_name = h($_POST['custemer_name']);
} else {
    $custemer_name = '';
}
if (!empty($_POST['custemer_email'])) {
    $custemer_email = h($_POST['custemer_email']);
} else {
    $custemer_email = '';
}
if (!empty($_POST['tel'])) {
    $tel = h($_POST['tel']);
} else {
    $tel = '';
}
if (!empty($_POST['subject'])) {
    $subject = h($_POST['subject']);
} else {
    $subject = '';
}
if (!empty($_POST['message'])) {
    $message = h($_POST['message']);
} else {
    $message = '';
}
?>

<div id="breadcrumb">
    <ol>
        <li><a href="index.php">ホーム</a></li>
        <li>確認画面</li>
    </ol>
</div>

<article>
    <h1>確認画面</h1>
    <div class="contents">
        <p>以下の内容で送信します。よろしいですか？</p>
        <form action="output2.php" method="post">
            <h2>お名前</h2>
            <p>
                <?= h($custemer_name); ?>
                <input type="hidden" name="custemer_name" value=" <?= h($custemer_name); ?>">
            </p>
            <h2>メールアドレス</h2>
            <p>
                <?= h($custemer_email); ?>
                <input type="hidden" name="custemer_email" value="<?= h($custemer_email); ?>">
            </p>
            <h2>電話番号</h2>
            <p>
                <?= h($tel); ?>
                <input type="hidden" name="tel" value="<?= h($tel); ?>">
            </p>
            <h2>件名</h2>
            <p>
                <?= h($subject); ?>
                <input type="hidden" name="subject" value="<?= h($subject); ?>">
            </p>
            <h2>問合せ内容</h2>
            <p>
                <?= h($message); ?>
                <input type="hidden" name="message" value="<?= h($message); ?>">
            </p>
            <p>
                <input type="submit" value="送信する"><button type="button" onclick="history.back()">修正する</button>
            </p>
        </form>
    </div>
</article>