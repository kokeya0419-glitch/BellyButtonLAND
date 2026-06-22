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
$order_id = filter_input(INPUT_GET, 'order_id', FILTER_VALIDATE_INT);

if ($user_id === null || $order_id === false || $order_id === null) {
    echo '<main class="container mt-5 pt-5 text-center">';
    echo '<h1>注文情報が取得できません</h1>';
    echo '<p><a href="mypage.php">マイページへ戻る</a></p>';
    echo '</main>';
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}

try {
    $dbh = db_open();

    // 注文の親情報を取得
    $sql = 'SELECT *
            FROM order_history
            WHERE order_id = :order_id
            AND user_id = :user_id';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        echo '<main class="container mt-5 pt-5 text-center">';
        echo '<h1>注文履歴が見つかりません</h1>';
        echo '<p><a href="mypage.php">マイページへ戻る</a></p>';
        echo '</main>';
        include './temp/footer1.php';
        include './temp/footer2.php';
        exit;
    }

    // 注文明細を取得
    $sql = 'SELECT
                od.order_details_id,
                od.order_id,
                od.item_id,
                od.order_details_price,
                od.quantity,
                g.goods_name,
                g.goods_image
            FROM order_details AS od
            LEFT JOIN goods AS g
            ON od.item_id = g.goods_id
            WHERE od.order_id = :order_id
            ORDER BY od.order_details_id ASC';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();

    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'DBエラー：' . h($e->getMessage());
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}
?>

<main class="container mt-5 pt-5 mb-5">

    <h1 class="text-center mb-5">注文履歴詳細</h1>

    <section class="mb-4">
        <h2 class="mb-3">注文情報</h2>

        <table class="table table-bordered">
            <tr>
                <th>注文ID</th>
                <td><?= h($order['order_id']) ?></td>
            </tr>
            <tr>
                <th>注文日</th>
                <td><?= h($order['created_at']) ?></td>
            </tr>
            <tr>
                <th>合計金額</th>
                <td><?= number_format((int)$order['total_price']) ?>円</td>
            </tr>
            <tr>
                <th>ステータス</th>
                <td><?= h($order['status']) ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h2 class="mb-3">購入商品</h2>

        <?php if (empty($details)): ?>

            <p class="text-center">購入商品が見つかりません。</p>

        <?php else: ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>商品名</th>
                        <th>購入時価格</th>
                        <th>数量</th>
                        <th>小計</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($details as $detail): ?>
                        <?php
                        $price = (int)$detail['order_details_price'];
                        $quantity = (int)$detail['quantity'];
                        $subtotal = $price * $quantity;
                        ?>

                        <tr>
                            <td><?= h($detail['goods_name'] ?? '商品情報なし') ?></td>
                            <td><?= number_format($price) ?>円</td>
                            <td><?= number_format($quantity) ?>個</td>
                            <td><?= number_format($subtotal) ?>円</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
    </section>

    <div class="text-center mt-4">
        <a href="mypage.php" class="btn btn-secondary">マイページへ戻る</a>
    </div>

</main>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
?>