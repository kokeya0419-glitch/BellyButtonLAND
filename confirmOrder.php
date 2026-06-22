<?php
include './temp/header.php';

$pin = $_POST['pinCode'] ?? '';

//カートの中身が空の場合
$cartItem = $_SESSION['cart'] ?? [];
if (empty($cartItem)) {
    echo 'カートが空です';
    exit;
}

//goods一覧を作成
$ids = array_column($cartItem, 'goods_id');

//商品情報の取得
$cartItems = [];
if (!empty($ids)) {
    try {
        $dbh = db_open();
        $placeholders = [];
        $params = [];

        //商品の配列を作成
        foreach ($ids as $index => $id) {
            $key = ':id' . $index;
            $placeholders[] = $key;
            $params[$key] = (int)$id;
        }
        //配列を文字列として繋げる
        $sql = 'SELECT * FROM goods WHERE goods_id IN (' . implode(',', $placeholders) . ')';
        $stmt = $dbh->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        }
        $stmt->execute();

        //取得したgoodsデータを$itemに格納する
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $cartItems[$item['goods_id']] = $item;
        }
    } catch (PDOException $e) {
        echo 'DBエラー：' . h($e->getMessage());
        exit;
    }
}

//合計金額計算用変数
$taxRate = 0.1;
$totalAmount = 0;
$totalTax = 0;
$totalAmountTax = 0;
?>
<!-- 表示内容(cart.phpと同様) -->
<table class="cart">
    <thead>
        <tr>
            <th>商品名</th>
            <th>価格（税込）</th>
            <th>個数</th>
            <th>小計</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cartItem as $value): ?>
            <?php
            $goods_id = (int)$value['goods_id'];
            $quantity = (int)$value['quantity'];

            if (!isset($cartItems[$goods_id])) {
                continue;
            }

            $price = (int)$cartItems[$goods_id]['goods_price'];
            $taxPrice = (int)($price * (1 + $taxRate));
            $subtotal = $taxPrice * $quantity;

            $totalAmount += $price * $quantity;
            $totalTax += (int)($price * $taxRate) * $quantity;
            $totalAmountTax += $subtotal;
            ?>

            <tr>
                <td><?= h($cartItems[$goods_id]['goods_name']) ?></td>
                <td><?= number_format($taxPrice) ?>円</td>
                <td><?= number_format($quantity) ?>個</td>
                <td><?= number_format($subtotal) ?>円</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="container text-center mt-4">
    <p>お買い物合計金額 = <?= number_format($totalAmount) ?>円</p>
    <p>消費税(10%) = <?= number_format($totalTax) ?>円</p>
    <p>お買い物金額(税込) = <?= number_format($totalAmountTax) ?>円</p>

    <form action="completeOrder.php" method="post">
        <div class="form-group">
            <label>決済認証コード</label>

            <input type="password" name="pinCode" class="form-control" maxlength="4" minlength="4" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{4}$" title="4文字の半角英数字で、大文字・小文字・数字をそれぞれ1文字以上含めてください">
        </div>
        <button type="submit" class="btn btn-danger">
            注文を確定する
        </button>
    </form>

    <p class="mt-3">
        <a href="cart.php">カートに戻る</a>
    </p>
</div>


<?php
include './temp/footer1.php';
include './temp/footer2.php';
