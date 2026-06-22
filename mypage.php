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

try {
    $dbh = db_open();

    // 登録情報取得
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

    // 注文履歴一覧取得
    $sql = 'SELECT *
            FROM order_history
            WHERE user_id = :user_id
            ORDER BY created_at DESC';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'DBエラー：' . h($e->getMessage());
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}
?>

<main class="container mt-5 pt-5 mb-5">

    <h1 class="text-center mb-5">マイページ</h1>

    <section class="mb-5">
        <h2 class="mb-3">登録情報</h2>

        <table class="table table-bordered">
            <tr>
                <th>ユーザー名</th>
                <td><?= h($user['user_name'] ?? '') ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?= h($user['email'] ?? '') ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?= h($user['tel'] ?? '') ?></td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td><?= h($user['post_code'] ?? '') ?></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><?= h($user['address'] ?? '') ?></td>
            </tr>
        </table>

        <p class="text-center">
            <a href="editUser.php" class="btn btn-primary">登録情報を変更する</a>
        </p>
    </section>

    <section>
        <h2 class="mb-3">注文履歴</h2>

        <?php if (empty($orders)): ?>

            <p class="text-center">注文履歴はありません。</p>

        <?php else: ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>注文ID</th>
                        <th>注文日</th>
                        <th>合計金額</th>
                        <th>ステータス</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= h($order['order_id']) ?></td>
                            <td><?= h($order['created_at']) ?></td>
                            <td><?= number_format((int)$order['total_price']) ?>円</td>
                            <td><?= h($order['status']) ?></td>
                            <td>
                                <a href="orderDetail.php?order_id=<?= h($order['order_id']) ?>" class="btn btn-sm btn-outline-primary">
                                    詳細を見る
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
    </section>

</main>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
?>