<?php
require_once './temp/functions.php';
include './temp/header.php';

$user_name = $_SESSION['user_name'] ?? 'ゲスト';

//商品IDチェック
if (!empty($_POST['goods_id'])) {
    $goods_id = (int)$_POST['goods_id'];
    if (!preg_match('/\A\d{0,11}\z/u', $goods_id)) {
        echo '該当商品はありません。';
        exit;
    }
}

//カート処理用配列 null合体演算子
//$_SESSIOM['cart']が存在していてnullでなければ、その値を使い「存在しない・nullなら」[ ]空の配列を代入
//カート内に商品があればカート処理用配列$cartItemに代入
$cartItem = $_SESSION['cart'] ?? [];

//商品追加処理
if (isset($_POST['goods_id']) && isset($_POST['quantity'])) {
    $goods_id = filter_input(INPUT_POST, 'goods_id', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    if ($goods_id === false || $goods_id === null || $goods_id <= 0) {
        echo '商品IDが不正です。';
        exit;
    }

    if ($quantity === false || $quantity === null || $quantity <= 0) {
        echo '数量が不正です。';
        exit;
    }

    $cart_id_array = array_column($cartItem, 'goods_id');

    if (in_array($goods_id, $cart_id_array)) {
        $index = array_search($goods_id, $cart_id_array);
        $cartItem[$index]['quantity'] += $quantity;
    } else {
        $cartItem[] = [
            'goods_id' => $goods_id,
            'quantity' => $quantity
        ];
    }
}
//商品削除処理
if (isset($_POST['delld'])) {
    $index = filter_input(INPUT_POST, 'delld', FILTER_VALIDATE_INT);

    if ($index !== false && $index !== null && isset($cartItem[$index])) {
        unset($cartItem[$index]);
        $cartItem = array_values($cartItem);
    }
}

//セッションに格納
$_SESSION['cart'] = $cartItem;

//商品情報の取得
$cartItems = [];
$ids = array_column($cartItem, 'goods_id');

//カート内にデータがあれば、PDO接続で商品IDのデータ(商品名、在庫数)を抽出
if (!empty($ids)) {
    try {
        $dbh = db_open();
        $placeholders = [];
        $params = [];
        foreach ($ids as $index => $id) {
            $key = ':id' . $index;
            $placeholders[] = $key;
            $params[$key] = (int)$id;
        }

        $sql = 'SELECT * FROM goods WHERE goods_id IN (' . implode(',', $placeholders) . ')';
        $stmt = $dbh->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val, PDO::PARAM_INT);
        }
        $stmt->execute();

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

<article class="cartBox">
    <h1>ショッピングカート</h1>
    <div class="container">
        <h2 class="text-center">現在のカート内容</h2>
    </div>

    <?php
    //カート内商品の表示
    if (!empty($cartItem)):
    ?>
        <table class="cart">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>価格（税込）</th>
                    <th>個数</th>
                    <th>小計</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //商品表示のループ処理
                foreach ($cartItem as $int => $value):
                    //商品がDBにない場合のエラー防止
                    $goods_id = (int)$value['goods_id'];
                    $quantity = (int)$value['quantity'];

                    if (!isset($cartItems[$goods_id])) {
                        unset($cartItem[$int]);
                        continue;
                    }
                    $stock = (int)$cartItems[$goods_id]['stock'] - $quantity;

                    //在庫判定
                    if ($cartItems[$goods_id]['stock'] == 0) {
                        $stockMessage = '<p class="sold">当商品は売り切れました</p>';
                    } elseif ($stock == 0 && $quantity > 0) {
                        $stockMessage = '<p class="sold">在庫僅かです。お急ぎください。</p>';
                    } elseif ($stock < 0) {
                        $stockMessage = '<p class="sold">在庫以上の個数がカートに入っています。</p>';
                    } else {
                        $stockMessage = '';
                    }

                    //合計金額計算
                    $price = (int)$cartItems[$goods_id]['price'];
                    $taxPrice = (int)($price * (1 + $taxRate));
                    $subtotal = $taxPrice * $quantity;
                ?>

                    <tr>
                        <td>
                            <h3><a href="item.php?id=<?= $goods_id ?>"><?= h($cartItems[$goods_id]['productName']) ?></a></h3>
                        </td>
                        <td>
                            <p class="price"><?= number_format($taxPrice) . '<span>円(税込)</span>' ?></p>
                        </td>
                        <td>
                            <p class="quantity"><?= number_format($quantity) . '個' ?></p>
                        </td>
                        <td>
                            <p class="subtotal"><?= number_format($subtotal) . '円(税込)' ?></p>
                        </td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="delld" value="<?= $int ?>">
                                <input type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                <?php
                    if (!empty($stockMessage)) {
                        echo '<tr>' . PHP_EOL . '<td colspan="5" class="notice">' . $stockMessage . '</td>' . PHP_EOL . '</tr>';
                    }


                    $totalAmount += $price * $quantity;
                    $totalTax += (int)($price * $taxRate) * $quantity;
                    $totalAmountTax += $subtotal;

                endforeach;
                ?>

            </tbody>
        </table>

    <?php
    else:
        echo '<div class="text-center">';
        echo '<p class="cartNull">カートは空です</p></div>';
    endif;
    ?>

    <!-- //金額表示 -->
    <div class="container">
        <h2 class="text-center"><?= $user_name ?>さんのお買い物合計</h2>
        <p class="text-center">お買い物合計金額 = <?= number_format($totalAmount) . '円' ?></p>
        <p class="text-center">消費税(10%) = <?= number_format($totalTax) . '円' ?></p>
        <p class="text-center">お買い物金額(税込) = <?= number_format($totalAmountTax) . '円' ?></p>
        <p class="text-center"><button onclick="location.href='./guzz.php'" class="returnShopping">買い物を続ける</button></p>
        <p class="text-center"><button onclick="location.href='payment.php'" class="payment">決済画面へ</button></p>
    </div>
</article>

カートのページです～

<?php
include './temp/footer1.php';
include './temp/footer2.php';
