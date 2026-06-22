<?php
require_once './temp/functions.php';
include './temp/header.php';

if (empty($_SESSION['login'])) {
    echo '<main class="container mt-5 pt-5 text-center">';
    echo '<h1>ログインしてください</h1>';
    echo '<p><a href="login.php">ログインページへ</a></p>';
    echo '</main>';
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id === null) {
    echo '<main class="container mt-5 pt-5 text-center">';
    echo '<h1>ユーザー情報が取得できません</h1>';
    echo '</main>';
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}

$dbh = db_open();
$message = '';

try {
    $sql = 'SELECT * FROM user WHERE user_id = :user_id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo '<main class="container mt-5 pt-5 text-center">';
        echo '<h1>ユーザーが見つかりません</h1>';
        echo '</main>';
        include './temp/footer1.php';
        include './temp/footer2.php';
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = trim($_POST['user_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tel = trim($_POST['tel'] ?? '');
        $post_code = trim($_POST['post_code'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $pinCode = trim($_POST['pinCode'] ?? '');

        if ($user_name === '') {
            $message = 'ユーザー名を入力してください。';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = 'メールアドレスの形式が正しくありません。';
        } elseif ($pinCode !== '' && !preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{4}$/', $pinCode)) {
            $message = '決済認証コードは4文字の半角英数字で、大文字・小文字・数字をそれぞれ1文字以上含めてください。';
        } else {
            if ($pinCode !== '') {
                $pinHash = password_hash($pinCode, PASSWORD_DEFAULT);

                $sql = 'UPDATE user
                        SET user_name = :user_name,
                            email = :email,
                            tel = :tel,
                            post_code = :post_code,
                            address = :address,
                            pin = :pin,
                            updated_at = NOW()
                        WHERE user_id = :user_id';

                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':pin', $pinHash, PDO::PARAM_STR);
            } else {
                $sql = 'UPDATE user
                        SET user_name = :user_name,
                            email = :email,
                            tel = :tel,
                            post_code = :post_code,
                            address = :address,
                            updated_at = NOW()
                        WHERE user_id = :user_id';

                $stmt = $dbh->prepare($sql);
            }

            $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindValue(':post_code', $post_code, PDO::PARAM_STR);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION['user_name'] = $user_name;

            header('Location: mypage.php');
            exit;
        }
    }

} catch (PDOException $e) {
    echo 'DBエラー：' . h($e->getMessage());
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}
?>

<main class="container mt-5 pt-5 mb-5">

    <h1 class="text-center mb-5">登録情報変更</h1>

    <?php if ($message !== ''): ?>
        <p class="alert alert-danger"><?= h($message) ?></p>
    <?php endif; ?>

    <form action="editUser.php" method="post" class="mx-auto" style="max-width: 600px;">

        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="user_name" class="form-control" value="<?= h($_POST['user_name'] ?? $user['user_name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" class="form-control" value="<?= h($_POST['email'] ?? $user['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>電話番号</label>
            <input type="text" name="tel" class="form-control" value="<?= h($_POST['tel'] ?? $user['tel'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="post_code" class="form-control" value="<?= h($_POST['post_code'] ?? $user['post_code'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" class="form-control" value="<?= h($_POST['address'] ?? $user['address'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>決済認証コード変更</label>
            <input
                type="password"
                name="pinCode"
                class="form-control"
                maxlength="4"
                minlength="4"
                pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{4}$"
                title="4文字の半角英数字で、大文字・小文字・数字をそれぞれ1文字以上含めてください"
                placeholder="変更する場合のみ入力">
            <small class="form-text text-muted">
                変更しない場合は空欄のままでOKです。
            </small>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">変更を保存する</button>
            <a href="mypage.php" class="btn btn-secondary ml-2">戻る</a>
        </div>

    </form>

</main>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
?>