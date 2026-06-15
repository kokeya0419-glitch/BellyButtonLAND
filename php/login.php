<?php
require_once 'php/functions.php';
include 'php/header.php';

if (!empty($_POST['login'])) {
    $message = 'ログイン済みです。';
} else {
    if (empty($_POST['email'] || (empty($_POST['password'])))) {
        $message = 'ユーザー名、パスワードを入力してください。';
    } else {
        try {
            $dbh = db_open();
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $dbh->prepara($sql);
            $stmt = bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $message = 'メールアドレスが存在しません。';
            } elseif (password_verify($_POST['password'], $user['password'])) {
                //セッション情報を新しく生成
                session_regenerate_id(true);

                //セッション情報を取得
                $_SESSION['login'] = true;

                //ヘッダに表示されるヘッダ情報を取得
                $_SESSION['user_name'] = $user['user_name'];
                header('Location./');
                exit;
            } else {
                $message = 'ユーザー名、もしくはパスワードが一致しません。';
            }
        } catch (PDOException $e) {
            echo 'エラー!:' . h($e->getMessage());
            exit;
        }
    }
}
?>

<div id="breadcrumb">
    <ol>
        <li><a href="index.php">TOPページ</a>&gt;</li>
        <li>会員ログイン</li>
    </ol>
</div>

<article>
    <h1>会員ログイン</h1>
    <p class="text-center">会員登録がお済みでない方は<button type="button" onclick="location.href='registration.php';">会員登録</button>を行ってください。</p>

    <?php
    //$messageに値が入っているなら
    if (!empty($message)) {
        echo '<p class = "warning">' . $message . '</p>' . PHP_EOL;
    }
    ?>

    <div class="contents">
        <form action="login.php" method="POST" class="registration">
            <div class="formFlex">
                <p><label for="mail">メールアドレス</label></p>
            </div>
            <div class="field">
                <p><input type="email" name="email" id="email" placeholder="半角英数字で入力をしてください。"></p>
            </div>
            <div class="label">
                <p><label for="password">パスワード</label></p>
                <div class="field">
                    <p><input type="password" name="password" id="password"></p>
                </div>
            </div>
            <p class="text-center"><button type="submit">会員ログイン</button></p>
        </form>
    </div>

</article>

<?php
include 'php/footer.php';