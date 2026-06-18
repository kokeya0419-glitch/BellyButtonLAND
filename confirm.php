<?php
require_once 'temp/functions.php';
include 'temp/header.php';

if (!empty($_POST['user_name'])) {
    $user_name = h($_POST['user_name']);
} else {
    $user_name = '';
}
if (!empty($_POST['email'])) {
    $email = h($_POST['email']);
} else {
    $email = '';
}
if (!empty($_POST['password'])) {
    $password = h($_POST['password']);
} else {
    $password = '';
}
if (!empty($_POST['post_code'])) {
    $post_code = h($_POST['post_code']);
} else {
    $post_code = '';
}
if (!empty($_POST['address'])) {
    $address = h($_POST['address']);
} else {
    $address = '';
}
if (!empty($_POST['tel'])) {
    $tel = h($_POST['tel']);
} else {
    $tel = '';
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
        <form action="conpletion.php" method="post" class="registration">
            <div class="formFlex">
                <div class="label">
                    <h2>お名前</h2>
                    <p>
                        <?= $user_name; ?>
                        <input type="hidden" name="user_name" value="<?= $user_name; ?>">
                    </p>
                </div>
                <h2>メールアドレス</h2>
                <p>
                    <?= $email; ?>
                    <input type="hidden" name="email" value="<?= $email; ?>">
                </p>
                <h2>パスワード</h2>
                <p>
                    <?= $password; ?>
                    <input type="hidden" name="password" value="<?= $password; ?>">
                </p>
                <h2>郵便番号</h2>
                <p>
                    <?= $post_code; ?>
                    <input type="hidden" name="post_code" value="<?= $post_code; ?>">
                </p>
                <h2>住所</h2>
                <p>
                    <?= $address; ?>
                    <input type="hidden" name="address" value="<?= $address; ?>">
                </p>
                <h2>電話番号</h2>
                <p>
                    <?= $tel; ?>
                    <input type="hidden" name="tel" value="<?= $tel; ?>">
                </p>
                <p>
                    <input type="submit" value="送信する"><button type="button" onclick="history.back()">修正する</button>
                </p>
        </form>
    </div>
</article>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
