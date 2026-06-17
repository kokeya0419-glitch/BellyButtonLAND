<?php
require_once 'php/functions.php';
include 'php/header.php';

if (!empty($_POST['name'])) {
    $name = h($_POST['name']);
} else {
    $name = '';
}
if (!empty($_POST['email'])) {
    $email = h($_POST['email']);
} else {
    $email = '';
}
if (!empty($_POST['tel'])) {
    $tel = h($_POST['tel']);
} else {
    $tel = '';
}
if (!empty($_comment['comment'])) {
    $comment = h($_POST['comment']);
} else {
    $comment = '';
}
?>

<div id="breadcrumb">
    <ol>
        <li><a href="index.php"></a></li>
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
                <?= $name; ?>
                <input type="hidden" name="name" value=" <?= $name; ?>">
            </p>
            <h2>メールアドレス</h2>
            <p>
                <?= $email; ?>
                <input type="hidden" name="mail" value="<?= $email; ?>">
            </p>
            <h2>電話番号</h2>
            <p>
                <?= $tel; ?>
                <input type="hidden" name="tel" value="<?= $tel; ?>">
            </p>
            <h2>問合せ内容</h2>
            <p>
                <?= $comment; ?>
                <input type="hidden" name="comment" value="<?= $comment; ?>">
            </p>
            <p>
                <input type="submit" value="送信する"><button type="button" onclick="history.back()">修正する</button>
            </p>
        </form>
    </div>
</article>