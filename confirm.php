<?php
// ここにページタイトルを入れる
$page_title = '確認画面';
$page_css = ["./css/login.css", "./css/confirm.css"];
require_once 'temp/functions.php';
include 'temp/header.php';

$error = [];

//バリデーション
$user_name = trim($_POST['user_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$post_code = trim($_POST['post_code'] ?? '');
$address = trim($_POST['address'] ?? '');
$tel = trim($_POST['tel'] ?? '');
$pinCode = trim($_POST['pinCode'] ?? '');

//名前
if($user_name === ''){
    $error[] = '名前を入力してください。';
} elseif(mb_strlen($user_name) > 50){
    $error[] = '名前は５０文字以下で入力してください。';
}

//メアド
if($email == ''){
    $error[] = 'メールアドレスを入力してください。';
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error[] = 'メールアドレスの形式が正しくありません。';
}

//パスワード
if($password == ''){
    $error[] = 'パスワードを入力してください。';
} elseif(strlen($password) < 8){
    $error[] = 'パスワードは８文字以上で入力してください。';
}

//郵便番号
if ($post_code == ''){
    $error[] = '郵便番号を入力してください。';
}elseif(!preg_match('/^\d{3}-?\d{4}$/', $post_code)){
    $error[] = '郵便番号は半角数字７桁で入力をしてください。';
}

//住所
if ($address == ''){
    $error[] = '住所を入力してください。';
} 

//電話番号
if ($tel == ''){
    $error[] = '電話番号を入力してください。';
} elseif(!preg_match('/^\d{10,11}$/', str_replace('-', '', $tel))){
    $error[] = '電話番号は10桁、または11桁で入力してください。';
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

    <?php
    //バリデーション確認
    if(!empty($error)): ?>
    <div class="error">
        <ul><?php foreach($error as $errors): ?>
            <li><?php echo h($errors);?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <p class="text-center"><button type="button" onclick="history.back()">修正する</button></p>

    <?php
        else:
    ?>

    <!-- バリデーションで異常なしの場合 -->
    <div class="contents">
        <p>以下の内容で送信します。よろしいですか？</p>
        <form action="conpletion.php" method="post" class="registration">
            <div class="formFlex">
                <div class="label">
                    <h2>お名前</h2>
                    <p>
                        <?= h($user_name); ?>
                        <input type="hidden" name="user_name" value="<?= h($user_name); ?>">
                    </p>
                </div>
                <h2>メールアドレス</h2>
                <p>
                    <?= h($email); ?>
                    <input type="hidden" name="email" value="<?= h($email); ?>">
                </p>
                <h2>パスワード</h2>
                <p>
                    <?= h($password); ?>
                    <input type="hidden" name="password" value="<?= h($password); ?>">
                </p>
                <h2>郵便番号</h2>
                <p>
                    <?= h($post_code); ?>
                    <input type="hidden" name="post_code" value="<?= h($post_code); ?>">
                </p>
                <h2>住所</h2>
                <p>
                    <?= h($address); ?>
                    <input type="hidden" name="address" value="<?= h($address); ?>">
                </p>
                <h2>電話番号</h2>
                <p>
                    <?= h($tel); ?>
                    <input type="hidden" name="tel" value="<?= h($tel); ?>">
                </p>
                <h2>pinコード</h2>
                <p>
                    <?= h($pinCode); ?>
                    <input type="hidden" name="pinCode" value="<?= h($pinCode); ?>">
                </p>
                <p>
                    <input type="submit" value="登録する">
                    <button type="button" onclick="history.back()">修正する</button>
                </p>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</article>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
