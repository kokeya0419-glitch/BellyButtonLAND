<?php
// ここにページタイトルを入れる
$page_title = 'チケット';
$page_css = ["./css/ticket.css"];
include './temp/header.php';
require_once './temp/functions.php';

// //goodsテーブルを配列に取得
$dbh = db_open();
$sql = 'SELECT * FROM goods WHERE categories_id BETWEEN 6 AND 10 ORDER BY categories_id';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$ticket = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブル6を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '6', PDO::PARAM_INT);
$stmt->execute();
$day1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブル7を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '7', PDO::PARAM_INT);
$stmt->execute();
$day2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブル8を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '10', PDO::PARAM_INT);
$stmt->execute();
$fast = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブル9を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '9', PDO::PARAM_INT);
$stmt->execute();
$night = $stmt->fetchAll(PDO::FETCH_ASSOC);

//goodsテーブル10を配列に取得
$sql = 'SELECT * FROM goods WHERE categories_id = :categories_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':categories_id', '8', PDO::PARAM_INT);
$stmt->execute();
$year = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="chara-placed-area text-center mt-5"></div>
<main class="container mb-5 ticket-main-container">

    <div class="d-flex justify-content-between align-items-center border-bottom  pb-3 mb-5 title-area">
        <h2 class="section-title food-title mb-0">夢～ム チケット</h2>
    </div>

    <div class="row">
        <div class="col-lg-9">

            <div class="ticket-header-box mb-4">
                <p class="mb-0 font-weight-bold text-center">チケットのご購入はこちら</p>
            </div>

            <div class="row no-gutters ticket-nav mb-5">
                <div class="col-4 p-1"><a href="#ticket-1day" class="btn btn-ticket-tab w-100">1dayパスポート</a></div>
                <div class="col-4 p-1"><a href="#ticket-2day" class="btn btn-ticket-tab w-100">2dayパスポート</a></div>
                <div class="col-4 p-1"><a href="#ticket-annual" class="btn btn-ticket-tab w-100">年間パスポート</a></div>
                <div class="col-4 p-1"><a href="#ticket-night" class="btn btn-ticket-tab w-100">ナイトパスポート</a></div>
                <div class="col-4 p-1"><a href="#ticket-express" class="btn btn-ticket-tab w-100">エクスプレス<br
                            class="d-none d-sm-inline">パスポート</a></div>
            </div>

            <!-- 1day -->
            <div id="ticket-2day" class="ticket-section mb-5">
                <div class="ticket-section-title mb-3">1dayパスポート</div>
                <div class="row px-2">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($day1[0]['goods_image']); ?>" class="ticket-bg-img" alt="大人用背景">
                            <span class="ticket-type"><?= h($day1[0]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($day1[0]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($day1[0]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($day1[1]['goods_image']); ?>" class="ticket-bg-img" alt="子ども用背景">
                            <span class="ticket-type"><?= h($day1[1]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format((int)$day1[1]['goods_price']); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($day1[1]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2day -->
            <div id="ticket-2day" class="ticket-section mb-5">
                <div class="ticket-section-title mb-3">2dayパスポート</div>
                <div class="row px-2">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($day2[0]['goods_image']); ?>" class="ticket-bg-img" alt="大人用背景">
                            <span class="ticket-type"><?= h($day2[0]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($day2[0]['goods_price'])) ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($day2[0]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($day2[1]['goods_image']); ?>" class="ticket-bg-img" alt="子供用背景">
                            <span class="ticket-type"><?= h($day2[1]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($day2[1]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($day2[1]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 年間 -->
            <div id="ticket-annual" class="ticket-section mb-5">
                <div class="ticket-section-title mb-3">年間パスポート</div>
                <div class="row px-2">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($year[0]['goods_image']); ?>" class="ticket-bg-img"
                                alt="大人用背景">
                            <span class="ticket-type"><?= h($year[0]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($year[0]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($year[0]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($year[1]['goods_image']); ?>" class="ticket-bg-img"
                                alt="子ども用背景">
                            <span class="ticket-type"><?= h($year[1]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($year[1]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($year[1]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ナイトパス -->
            <div id="ticket-night" class="ticket-section mb-5">
                <div class="ticket-section-title mb-3">ナイトパスポート</div>
                <div class="row px-2">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($night[0]['goods_image']); ?>" class="ticket-bg-img"
                                alt="大人用背景">
                            <span class="ticket-type"><?= h($night[0]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($night[0]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($night[0]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($night[1]['goods_image']); ?>" class="ticket-bg-img"
                                alt="子ども用背景">
                            <span class="ticket-type"><?= h($night[1]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($night[1]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($night[1]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ticket-express" class="ticket-section mb-5">
                <div class="ticket-section-title mb-3">エクスプレスパスポート</div>
                <div class="row px-2">
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($fast[0]['goods_image']); ?>" class="ticket-bg-img" alt="大人用背景">
                            <span class="ticket-type"><?= h($fast[0]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($fast[0]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($fast[0]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 px-2">
                        <div class="ticket-card d-flex flex-column align-items-center justify-content-center">
                            <img src="./img/passport/<?= h($fast[1]['goods_image']); ?>" class="ticket-bg-img"
                                alt="子ども用背景">
                            <span class="ticket-type"><?= h($fast[1]['status']); ?></span>
                            <span class="ticket-price">¥<?= number_format(h($fast[1]['goods_price'])); ?>(税込)</span>
                            <a href="ticketDetail.php?goods_id=<?= h($fast[1]['goods_id']) ?>" class="btn btn-purchase ml-auto mt-2">詳細ページへ</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-3 mt-5 mt-lg-0">
            <div class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="./character.php"
                        class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        キャラクター紹介
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="./map.php"
                        class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        園内マップ
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center mt-5">
        <a href="index.html" class="btn text-muted font-weight-bold btn-back-home">
            &larr; トップページへ戻る
        </a>
    </div>
</main>

<?php
include './temp/footer1.php';
?>

<?php
include './temp/footer2.php';
?>