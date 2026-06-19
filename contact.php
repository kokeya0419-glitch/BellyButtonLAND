<?php
$page_css = ["./css/contact.css"];
include './temp/header.php';
require_once './temp/functions.php';
?>

<article>
    <h1>お問い合わせ</h1>
    <div class="contents">
        <p>こちらから</p>
        <form action="./output.php" method="POST">
        <p>
            <label>お名前</label><br>
            <input type="text" name="custemer_name" placeholder="名前" required>
        </p>
        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="custemer_email" placeholder="半角英数" required>
        </p>
        <p>
            <label>電話番号</label><br>
            <input type="tel" name="tel" placeholder="電話番号" required>
        </p>
        <p>
            <label>件名</label><br>
            <input type="text" name="subject" placeholder="件名" required>
        </p>
        <p>
            <label>問合せ内容</label><br>
            <textarea id="message" name="message" rows="5" cols="40" placeholder="ここにメッセージを入力してください"></textarea>
        </p>
    </div>
    <p><input type="submit" value="送信する"></p>
    </form>
</article>

<?php
include './temp/footer1.php';
include './temp/footer.php';