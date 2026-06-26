<?php
// ここにページタイトルを入れる
$page_title = 'グッズ';
$page_css = ["./css/guzz.css"];
require_once './temp/functions.php';
include './temp/header.php';

$dbh = db_open();

//限定グッズの商品を配列に格納
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '5', PDO::PARAM_INT);
$stmt->execute();
$limited_goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

//売れ筋ランキングを配列に格納
$sql = 'SELECT * FROM goods ORDER BY sold_count DESC LIMIT 3';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$goods_ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブルのカテゴリID_1を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '1', PDO::PARAM_INT);
$stmt->execute();
$snacks_goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブルのカテゴリID_2を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '2', PDO::PARAM_INT);
$stmt->execute();
$toys_goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブルのカテゴリID_3を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '3', PDO::PARAM_INT);
$stmt->execute();
$fashion_goods = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブルのカテゴリID_4を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '4', PDO::PARAM_INT);
$stmt->execute();
$apparel_goods = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>
<style>
    .backImage {
        position: fixed;
        top: -300px;
        left: 40%;
        transform: translateX(-50%);
        z-index: -1;
        opacity: 0.2;
    }

    .backImage img {
        width: 1300px;
    }
</style>
<div class="backImage">
    <img src="./img/backImg/ph.png">
</div>

<!-- ボーダーライン -->
<div class="chara-placed-area text-center mt-5"></div>

<main class="container mb-5 goods-main-container">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-5">
        <h2 class="section-title goods-title mb-0">グッズ紹介</h2>
        <!-- <div class="heart-icon title-heart"></div> -->
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div id="limited-goods" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title pink-border sub-title">
                    限定グッズ
                </h3>

                <div class="row">
                    <!-- 各コンテンツのループ表示、ページ内で同じ処理を繰り返す -->
                    <?php foreach ($limited_goods as $index => $limited): ?>
                        <div class="col-md-4 col-6 mb-4">
                            <!-- 商品ページに飛ぶと同時に商品idを引数として持たせる -->
                            <!-- <a href="./goodsdetail.php?goods_id=<?= $limited['goods_id']; ?>"> -->
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($limited['goods_id']) ?>';">
                                <img src="./img/goods/<?= h($limited['goods_image']); ?>.png" alt="<?= h($limited['goods_name']); ?>" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($limited['goods_name']); ?></h4>
                                <p class="text-muted small mb-2 text-center"><?= h($limited['description']); ?></p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$limited['goods_price']); ?><span class="h6"> (税込)</span></p>
                            </div>
                            <!-- </a> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="ranking" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title pink-border">
                    👑 売れ筋ランキング
                </h3>
                <div class="row">
                    <?php foreach ($goods_ranking as $index => $ranking): ?>
                        <div class="col-md-4 col-6 mb-4">
                            <!-- <a href="./goodsdetail.php?goods_id=<?= $ranking['goods_id']; ?>"> -->
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($ranking['goods_id']) ?>';">
                                <span class="badge-ranking ranking-1st"><?= $index + 1 ?>位</span>
                                <img src="./img/goods/<?= h($ranking['goods_image']) ?>.png" alt="1位" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($ranking['goods_name']); ?></h4>
                                <p class="text-muted small mb-2 text-center"><?= h($ranking['description']); ?></p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$ranking['goods_price']); ?><span class="h6"> (税込)</span></p>
                            </div>
                            <!-- </a> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="other-goods" class="mb-5 p-4 other-goods-box">
                <h3 class="h4 font-weight-bold mb-5 other-goods-title sub-title">
                    その他グッズ
                </h3>

                <div id="sweets-food" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ お菓子　食品</h4>
                    <div class="row">
                        <?php foreach ($snacks_goods as $index => $snacks): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <!-- <a href="./goodsdetail.php?goods_id=<?= $snacks['goods_id']; ?>"> -->
                                <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($snacks['goods_id']) ?>';">
                                    <img src="./img/goods/<?= h($snacks['goods_image']); ?>.png" alt="<?= h($snacks['goods_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($snacks['goods_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($snacks['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$snacks['goods_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                                <!-- </a> -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="toys" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ ぬいぐるみ　おもちゃ</h4>
                    <div class="row">
                        <?php foreach ($toys_goods as $index => $toys): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <!-- <a href="./goodsdetail.php?goods_id=<?= $toys['goods_id']; ?>"> -->
                                <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($toys['goods_id']) ?>';">
                                    <img src="./img/goods/<?= h($toys['goods_image']); ?>.png" alt="<?= h($toys['goods_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($toys['goods_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($toys['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$toys['goods_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                                <!-- </a> -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="fashion-items" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ ファッションアイテム</h4>
                    <div class="row">
                        <?php foreach ($fashion_goods as $index => $fashion): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <!-- <a href="./goodsdetail.php?goods_id=<?= $fashion['goods_id']; ?>"> -->
                                <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($fashion['goods_id']) ?>';">
                                    <img src="./img/goods/<?= h($fashion['goods_image']); ?>.png" alt="<?= h($fashion['goods_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($fashion['goods_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($fashion['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$fashion['goods_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                                <!-- </a> -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="apparel" class="mb-3">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ アパレル</h4>
                    <div class="row">
                        <?php foreach ($apparel_goods as $index => $apparel): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <!-- <a href="./goodsdetail.php?goods_id=<?= $apparel['goods_id']; ?>"> -->
                                <div class="card h-100 border-0 shadow-sm p-3 item-goods-card" onclick="location.href='goodsdetail.php?goods_id=<?= h($apparel['goods_id']) ?>';">
                                    <img src="./img/goods/<?= h($apparel['goods_image']) ?>.png" alt="<?= h($apparel['goods_name']) ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($apparel['goods_name']) ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($apparel['description']) ?></p>
                                    <p class="font-weight-bold mb-0 text-danger mt-auto text-center">￥<?= number_format((int)$apparel['goods_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                                <!-- </a> -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- サイドバー -->
        <div class="col-lg-3 mt-5 mt-lg-0">
            <div class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="./character.php"
                        class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        キャラクター紹介
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="map.php"
                        class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        園内マップ
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="./ticket.php"
                        class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        チケット
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center mt-5">
        <a href="index.html" class="btn text-muted font-weight-bold btn-back-home">
            ← トップページへ戻る
        </a>
    </div>
    <div class="goods-action-container">
        <button id="omikujiBtn" class="omikuji-btn">🎰 迷ったらコレ！おすすめ抽選</button>
        <button id="scrollTopBtn" class="scroll-top-btn">▲</button>
    </div>

    <div id="goodsModal" class="goods-modal">
        <div class="goods-modal-content">
            <h3 class="h5 font-weight-bold mb-3" style="color:#ff7472;">✨ 本日のおすすめグッズ ✨</h3>
            <div id="modalItemContainer">
            </div>
            <button id="modalCloseBtn" class="btn btn-secondary btn-sm mt-3 w-100" style="border-radius:30px;">閉じる</button>
        </div>
    </div>
</main>
<?php
include './temp/footer1.php';
?>
<script src="./js/guzz.js"></script>
<?php
include './temp/footer2.php';
?>