<article>
    <h1>お問い合わせ</h1>
    <div class="contents">
        <p>こちらから</p>
        <form action="php/output.php" method="POST">
        <p>
            <label>お名前</label><br>
            <input type="text" name="name" placeholder="名前" required>
        </p>
        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="email" placeholder="半角英数" required>
        </p>
        <p>
            <label>電話番号</label><br>
            <input type="tel" name="tel" placeholder="電話番号" required>
        </p>
        <p>
            <label>問合せ内容</label><br>
            <textarea id="comment" name="comment" rows="5" cols="40" placeholder="ここにメッセージを入力してください"></textarea>
        </p>
    </div>
    <p><input type="submit" value="送信する"></p>
    </form>
</article>
