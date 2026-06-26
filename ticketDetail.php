<?php
// ここにページタイトルを入れる
$page_title = 'チケット購入';
$page_css = ["./css/ticketDetail.css"];
include './temp/header.php';
require_once './temp/functions.php';

//ticket.phpからgoods_idをint型としてgetで受け取る。
$goods_id = filter_input(INPUT_GET, 'goods_id', FILTER_VALIDATE_INT);
if ($goods_id === false || $goods_id === null) {
    echo '商品が見つかりません。';
    exit;
}

//ベースとなるクリックされた商品の情報を取得
$dbh = db_open();
$sql = 'SELECT * FROM goods WHERE goods_id = :goods_id';;
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':goods_id', $goods_id, PDO::PARAM_INT);
$stmt->execute();
$baseGoods = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$baseGoods) {
    echo '商品が見つかりません。';
    exit;
}

switch($baseGoods['categories_id']){
    case 6:
        $image = '1daypass/1day見本.png';
        break;
    case 7:
        $image = '2daypass/2daypassport見本.png';
        break;
    case 8:
        $image = 'yearpass/yearpass詳細.png';
        break;
    case 9:
        $image = 'nightpass/nightpass.png';
        break;
    case 10:
        $image = 'fastpass/fastpass原本.png';
}

$categories_id = (int)$baseGoods['categories_id'];

//同じカテゴリの商品を全部取得　大人・子供用
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id ORDER BY goods_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', $categories_id, PDO::PARAM_INT);
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($tickets)) {
    echo 'チケット情報が見つかりません';
    exit;
}

?>

<main class="container detail-main-container">
    <div class="mb-3 mt-2">
        <a href="ticket.php" class="btn-back-link">&larr; チケット一覧に戻る</a>
    </div>

    <div class="row align-items-stretch">

        <div class="col-md-6 mb-4 mb-md-0">
            <div class="detail-img-box h-100">
                <img src="./img/passport/<?= $image ?>" alt="<?= h($baseGoods['goods_name']); ?>"
                    class="img-fluid detail-img rounded shadow-sm">
            </div>
        </div>

        <div class="col-md-6">
            <div class="detail-info-box d-flex flex-column h-100 p-4 p-lg-5 pt-md-0">

                <!-- ここから商品情報の受け渡し -->
                <form action="cart.php" method="POST">
                    <h2 class="detail-title mt-0 mb-2">
                        <?= h($baseGoods['goods_name']); ?>
                    </h2>
                    <?php foreach ($tickets as $ticket): ?>
                        <p class="detail-price mb-2">
                            <?= h($ticket['status']) ?> ¥<?= number_format((int)$ticket['goods_price']); ?>
                            <span>（税込）</span>
                        </p>
                        <div class="detail-quantity d-flex align-items-center mb-3">
                            <span class="mr-4 font-weight-bold" style="min-width: 4em;">
                            </span>
                            <button type="button" class="btn btn-qty-blue btn-minus">－</button>
                            <input type="text" name="tickets[<?= h($ticket['goods_id']) ?>]" class="qty-input text-center mx-2" value="0" readonly>
                            <button type="button" class="btn btn-qty-blue btn-plus">＋</button>
                        </div>
                    <?php endforeach; ?>

                    <button class="btn btn-purchase w-100 py-3 mb-5 detail-cart-btn">
                        カートに入れる
                    </button>

                </form>
            </div>
        </div>

    </div>
</main>

<?php
include './temp/footer1.php';
?>

<script src="./js/ticketDetail.js"></script>

</body>

</html>



<?php
include './temp/footer2.php';
?>