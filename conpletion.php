<?php
require_once './temp/functions.php';
include './temp/header.php';

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$created_at = null;
$updated_at = null;
$deleted_at = null;

//ユーザーデータ追加処理
try {
    $dbh = db_open();
    $sql = 'INSERT INTO user(user_id,user_name,email,password,post_code,address,tel,created_at,updated_at,deleted_at)VALUES(NULL, :user_name, :email, :password, :post_code, :address, :tel, :created_at, :updated_at, :deleted_at)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_name', $_POST['user_name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':post_code', $_POST['post_code'], PDO::PARAM_STR);
    $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
    $stmt->bindParam(':deleted_at', $deleted_at, PDO::PARAM_STR);
    $stmt->execute();
    echo 'ユーザーデータが追加されました。';
    echo '<a href="main.php">リストへ戻る</a>';
?>

    <!-- トップページに戻る -->

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="3; URL=./login.php">
        <title>会員登録完了</title>
    </head>

    <body>
        <div id="breadcrumb">
            <ol>
                <li><a href="./main.php">ホーム</a>&gt;</li>
                <li>会員登録完了</li>
            </ol>
        </div>
        <article>
            <h1>会員登録完了</h1>
        </article>

        <p>3秒後にTOPページへ移動します。</p>
        <p>自動で戻らない場合は<a href="./login.php">ここをクリック</a></p>
    </body>


<?php
} catch (PDOException $e) {
    echo 'エラー！：' . h($e->getMessage());
    exit;
}
?>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
