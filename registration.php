<?php
$page_css = ["./css/login.css"];
require_once 'temp/functions.php';
include 'temp/header.php';
?>
<div id="breadcrumb">
    <ol>
        <li><a href="main.php">ホーム</a>&gt;</li>
        <li>会員登録</li>
    </ol>
</div>
<article>
    <h1>会員登録</h1>
    <div class="contents">
        <form action="./confirm.php" method="POST" class="registration">
            <div class="formFlex">
                <div class="label">
                    <p>名前</p>
                </div>
                <div class="field">
                    <p>
                        <label><input type="text" name="user_name" id="user_name" required></label>
                    </p>
                </div>
                <div class="label">
                    <p><label for="email">メールアドレス</label></p>
                </div>
                <div class="field">
                    <p><input type="email" name="email" id="email" placeholder="半角英数字"></p>
                </div>
                <div class="label">
                    <p><label for="password">パスワード</label></p>
                </div>
                <div class="field">
                    <p><input type="password" name="password" id="password"></p>
                </div>
                <div class="post_code">
                    <p><label for="post_code">郵便番号</label></p>
                </div>
                <div class="post_code">
                    <p><input type="text" name="post_code" id="post_code"></p>
                </div>
                <div class="address">
                    <p><label for="address">住所</label></p>
                </div>
                <div class="post_code">
                    <p><input type="text" name="address" id="address"></p>
                </div>
                <div class="label">
                    <p><label for="tel">電話番号</label></p>
                </div>
                <div class="field">
                    <p><input type="tel" name="tel" id="tel"></p>
                </div>
                <p class="text-center"><button type="submit">会員登録する</button></p>
        </form>
    </div>
</article>

<?php
include 'temp/footer1.php';
include 'temp/footer2.php';
