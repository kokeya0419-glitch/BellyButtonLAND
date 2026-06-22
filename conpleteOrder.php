<?php

$cartItem = $_SESSION['cart'] ?? [];
if (empty($cartItem)) {
    echo 'カートに商品がありません';
    exit;
}

$user_id = $_SESSION['user_id'] ?? null;
if ($user_id === null) {
    echo 'ログインをしてください。';
    exit;
}

//使う変数を先に宣言しておく
$totalAmountTax = 0;

try {
    //order_detaileテーブルに一連の商品登録処理を行う
    //beginTransaction();はロールバックできるようにセーブポイントのようなメソッド
    $dbh->beginTransaction();

    //カート内の商品一覧を作成する。
    $ids = array_column($cartItem, 'goods_id');
    $placeholder = [];
    $params = [];

    foreach ($ids as $index => $id) {
        $key = ':id' . $index;
        $placeholder[] = $key;
        $params[$key] = (int)$id;
    }

    //goodsテーブルから商品情報を取得しておく
    $dbh = db_open();
    $sql = 'SELECT * FROM goods WHERE goods_id IN(' . implode(',', $placeholder) . ')';
    $stmt = $dbh->prepare($sql);
    foreach($params as $key => $index){
        $stmt -> bindValue($key, $index, PDO::PARAM_INT);
    }
    $stmt->execute();

    $cartItem = [];
    foreach($stmt -> fetchAll(PDO::FETCH_ASSOC) as $item){
        $cartItems[(int)$item['goods_id']] = $item;
    }

    foreach ($cartItem as $index) {
        $goods_id = (int)$index['goods_id'];
        $quantity = (int)$index['quantity'];

        if(!isset($cartItems[$goods_id])){
            throw new EXception('商品が見当たりません');
        }

        //DBから取得した商品情報をイント型にキャストして格納する。金額の計算もする。
        $price = (int)$cartItem[$goods_id]['goods_price'];
        $taxPrice = (int)($price * 1.1);
        $totalAmountTax += $taxPrice * $quantity;
    }

    //order_historyに親となる注文データを作る。
    $sql = 'INSERT INTO order_history (user_id, total_price, status, created_at) VALUES (:user_id, :total_price, :status, NOW())';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':total_price', $totalAmountTax, PDO::PARAM_INT);
    $stmt->bindValue(':status', '注文完了', PDO::PARAM_STR);
    $stmt->execute();

    //一番最後にINSERTされたIDを取得するメソッド
    //注文履歴のid番号に各商品を紐づけたい（観覧できる）から使用するメソッド
    //注文した商品群の最後のidに他の商品も紐づけるイメージ
    $order_id = $dbh->lastInsertId();

    //DBにSQL文でデータを格納する。
    //ここで保存するpriceは購入時の価格、注文履歴で当時の金額を知ることが出来るように。
    foreach ($cartItem as $value) {
        $sql = 'INSERT INTO order_details
                (order_id, item_id, order_details_price, quantity, created_at) VALUES (:order_id, :item_id, :order_details_price, :quantity, NOW())';
        $stmt = $dbh->prepare($sql);
        //bindValueは１個ずつしか書けない
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindValue(':item_id', $goods_id, PDO::PARAM_INT);
        $stmt->bindValue(':order_details_price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
    }

    //注文された数の商品を在庫から減らして、売上数を増やす処理
    $sql = 'UPDETA goods SET stock = stock - :quantity, sold_count = sold_count + :quantity WHERE goods_id = :goods_id';
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt -> bindValue(':goods_id', $goods_id, PDO::PARAM_INT);
    $stmt -> execute();

    //処理が無事に終われば注文処理をコミットする。
    $dbh->commit();
    unset($_SESSION['cart']);
    echo '注文完了';

    //ヘッダーはここで読み込む。処理の前に書くと表示のズレとかが発生する。
    include './temp/header.php';
    echo '<main class="container mt-5 pt-5 text-center">';
    echo '<h1>注文完了</h1>';
    echo '<p>ご注文ありがとうございました。</p>';
    echo '<p><a href="main.php">トップページへ戻る</a></p>';
    echo '</main>';
    include './temp/footer1.php';
    include './temp/footer2.php';
} catch (PDOException $e) {
    //注文処理に失敗した場合はコミットしない
    $dbh->rollBack();
    include './temp/header.php';
    echo '注文処理に失敗しました' . h($e->getMessage());
    include './temp/footer1.php';
    include './temp/footer2.php';
    exit;
}
