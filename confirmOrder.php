<?php
$page_css = ["./css/confirmOrder.css", "./css/cart.css"];
include './temp/header.php';

$pin = $_POST['pinCode'] ?? '';

//カートの中身が空の場合
$cartItem = $_SESSION['cart'] ?? [];
if (empty($cartItem)) {
    echo '<div class="container text-center"><p class="cartNull">カートが空です</p><p><a href="cart.php" class="returnShopping">カートに戻る</a></p></div>';
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}

//idだけを抽出してgoods一覧を作成
$ids = array_column($cartItem, 'goods_id');

//商品情報の取得
$cartItems = [];
if (!empty($ids)) {
    try {
        $dbh = db_open();
        $placeholders = [];
        $params = [];

        //sql文で使うための配列を作成
        foreach ($ids as $index => $id) {
            $key = ':id' . $index;
            $placeholders[] = $key;
            $params[$key] = (int)$id;
        }
        //配列を文字列として繋げてsqlの実行準備
        $sql = 'SELECT * FROM goods WHERE goods_id IN (' . implode(',', $placeholders) . ')';
        $stmt = $dbh->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        }
        $stmt->execute();

        //sqlで取得したgoodsデータを後々２次元配列で取り出しやすいような形で$itemに格納する
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $cartItems[$item['goods_id']] = $item;
        }
    } catch (PDOException $e) {
        echo 'DBエラー：' . h($e->getMessage());
        exit;
    }
}

//合計金額計算用変数
// $taxRate = 0.1;
$totalAmount = 0;
$totalTax = 0;
$totalAmountTax = 0;
?>

<article class="orderConfirmBox">
    <h1>注文内容の確認</h1>
    <div class="container">
        <h2 class="text-center">以下の内容でご注文を確定します。</h2>
    </div>

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
                // $taxPrice = (int)($price * (1 + $taxRate));
                $subtotal = $price * $quantity;

                $totalAmount += $price * $quantity;
                $totalTax += (int)$price * $quantity;
                $totalAmountTax += $subtotal;
                ?>

                <tr>
                    <td>
                        <h3><?= h($cartItems[$goods_id]['goods_name']) ?></h3>
                    </td>
                    <td>
                        <p class="price"><?= number_format($price) ?>円</p>
                    </td>
                    <td>
                        <p class="quantity"><?= number_format($quantity) ?>個</p>
                    </td>
                    <td>
                        <p class="subtotal"><?= number_format($subtotal) ?>円</p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="confirmSummary container">
        <div class="amountDetails">
            <h3 class="summaryTitle">お買い物合計</h3>
            <p><span>商品合計金額</span> <span><?= number_format($totalAmount) ?>円</span></p>
            <p class="totalAmountTaxRow"><span>合計金額(税込)</span> <span><?= number_format($totalAmountTax) ?>円</span></p>
        </div>

        <div class="confirmFormArea">
            <form action="completeOrder.php" method="post">
                <div class="form-group">
                    <label for="pinCode">決済認証コード</label>
                    <input type="password" id="pinCode" name="pinCode" class="form-control" maxlength="4" minlength="4" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{4}$" placeholder="4桁の英数字" title="4文字の半角英数字で、大文字・小文字・数字をそれぞれ1文字以上含めてください">
                    <small class="form-text text-muted">※大文字・小文字・数字を各1文字以上含む4桁</small>
                </div>
                <button type="submit" class="btn-order-submit">
                    注文を確定する
                </button>
            </form>
        </div>
    </div>

    <p class="text-center mt-4">
        <a href="cart.php" class="back-to-cart">◀ カートに戻って数量を変更する</a>
    </p>
</article>

<?php
include './temp/footer1.php';
include './temp/footer2.php';
?>