<?php
$page_css = ["./css/login.css"];
require_once 'temp/functions.php';
include 'temp/header.php';

//バリデーションの準備
$error = [];

// 💡 改善：すでにログイン済みの場合はTOPページへ飛ばす
if (!empty($_SESSION['login'])) {
    $message = 'ログイン済みです。';
    header('Location: ./main.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    //メアド
    if ($email == '') {
        $error[] = 'メールアドレスを入力してください。';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'メールアドレスの形式が正しくありません。';
    }

    //パスワード
    if ($password == '') {
        $error[] = 'パスワードを入力してください。';
    } elseif (strlen($password) < 8) {
        $error[] = 'パスワードは８文字以上で入力してください。';
    }
}

//バリデーション異常無しの場合
if (empty($error)) {
    // $errorが空ならtryの処理に移る
    try {
        // echo '<script>alert("tryに入ったよ");</script>';
        $dbh = db_open();
        $sql = 'SELECT * FROM user WHERE email = :email';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $error = 'メールアドレス、またはパスワードが一致しません。';
        } elseif (password_verify($_POST['password'], $user['password'])) {
            //セッション情報を新しく生成
            session_regenerate_id(true);

            //セッション情報を取得
            $_SESSION['login'] = true;

            //ヘッダに表示されるヘッダ情報を取得
            $_SESSION['user_name'] = $user['user_name'];

            //ユーザーIDの情報を取得
            $_SESSION['user_id'] = $user['user_id'];
?>
            <!-- トップページに戻る -->
            <!DOCTYPE html>
            <html lang="ja">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="refresh" content="3; URL=./main.php">
                <title>ログイン完了</title>
            </head>

            <body class="text-center">
                <p>ログインしました。</p>
                <p>3秒後にTOPページへ移動します。</p>
                <p>自動で戻らない場合は<a href="./main.php">ここをクリック</a></p>
            </body>

            </html>
<?php
            exit;
        } else {
            $message = 'ユーザー名、もしくはパスワードが一致しません。';
        }
    } catch (PDOException $e) {
        echo 'エラー!:' . h($e->getMessage());
        exit;
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
                <p><label for="email">メールアドレス</label></p>
            </div>
            <div class="field">
                <p><input type="email" name="email" id="email" placeholder="半角英数字" autofocus></p>
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
include 'temp/footer1.php';
include 'temp/footer2.php';
