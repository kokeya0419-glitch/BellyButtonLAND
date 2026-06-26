<?php
// ここにページタイトルを入れる
$page_title = 'フード＆カフェ';
$page_css = ["./css/food.css"];
require_once './temp/functions.php';
include './temp/header.php';

//foodテーブルの配列の取得
$dbh = db_open();
$sql = 'SELECT * FROM foods';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
//シャッフルで配列をランダムに入れ替えて、for文で３個だけ配列に格納
$limitedFoodNum = [3, 6, 13, 14, 18];
shuffle($limitedFoodNum);
$limitedFoods = [];
for ($i = 0; $i < 3; $i++) {
    $limitedFoods[] = $foods[$limitedFoodNum[$i]];
}

//売上上位３つを抽出
$sql = 'SELECT * FROM foods ORDER BY sold_count DESC LIMIT 3';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$foods_ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

//その他フード&カフェの写真を配列に格納
$cafe = [];
foreach ([1, 2, 3, 4, 5, 6, 15, 16] as $id) {
    $cafe[] = $foods[$id];
}

//レストラン・がっつりの写真を配列に格納
$restaurant = [];
foreach ([0, 10, 11, 12, 13, 14, 15] as $id) {
    $restaurant[] = $foods[$id];
}

//カフェ・ドリンクの写真を配列に格納
$drink = [];
foreach ([7, 8, 9, 16, 17, 18] as $id) {
    $drink[] = $foods[$id];
}

?>
<style>
    .backImage {
        position: fixed;
        top: -140px;
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
    <img src="./img/backImg/mt.png">
</div>

<div class="chara-placed-area text-center mt-5"></div>
<main class="container mb-5 food-main-container">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-5">
        <h2 class="section-title food-title mb-0">フード＆カフェ紹介</h2>
        <!-- <div class="heart-icon title-heart"></div> -->
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div id="limited-food" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title orange-border">
                    限定フード　ドリンク
                </h3>
                <div class="row">
                    <!-- 配列をforeachで回す、各コンテンツ同じ処理を行う -->
                    <?php foreach ($limitedFoods as $foods): ?>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-food-card" onclick="location.href='foodDetail.php?food_id=<?= h($foods['food_id']) ?>';">
                                <img src="./img/foods/<?= h($foods['food_image']); ?>" alt="<?= h($foods['food_name']) ?>" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($foods['food_name']); ?></h4>
                                <p class="text-muted small mb-2 text-center"><?= h($foods['description']); ?></p>
                                <p class="font-weight-bold mb-0 text-orange mt-auto text-center">￥<?= number_format(h($foods['food_price'])); ?><span class="h6"> (税込)</span></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="ranking" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title orange-border">
                    👑 売れ筋ランキング
                </h3>
                <div class="row">
                    <?php foreach ($foods_ranking as $index => $fr): ?>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-food-card" onclick="location.href='foodDetail.php?food_id=<?= h($fr['food_id']) ?>';">
                                <span class="badge-ranking ranking-<?= $index + 1 ?>st"><?= $index + 1 ?>位</span>
                                <img src="./img/foods/<?= h($fr['food_image']); ?>" alt="<?= h($fr['food_name']); ?>" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($fr['food_name']); ?></h4>
                                <p class="text-muted small mb-2 text-center"><?= h($fr['description']); ?></p>
                                <p class="font-weight-bold mb-0 text-orange mt-auto text-center">￥<?= number_format((int)$fr['food_price']); ?><span class="h6 "> (税込)</span></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="other-foods" class="mb-5 p-4">
                <h3 class="h4 font-weight-bold mb-5 other-food-title">
                    その他フード＆カフェ
                </h3>

                <div id="sweets-snack" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ 食べ歩き　スイーツ</h4>
                    <div class="row">
                        <?php foreach ($cafe as $index => $cafe_food): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm p-3 item-food-card" onclick="location.href='foodDetail.php?food_id=<?= h($cafe_food['food_id']) ?>';">
                                    <img src="./img/foods/<?= h($cafe_food['food_image']); ?>" alt="<?= h($cafe_food['food_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($cafe_food['food_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($cafe_food['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-orange mt-auto text-center">￥<?= number_format((int)$cafe_food['food_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="restaurant" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ レストラン　がっつり</h4>
                    <div class="row">
                        <?php foreach ($restaurant as $index => $restaurant_menu): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm p-3 item-food-card" onclick="location.href='foodDetail.php?food_id=<?= h($restaurant_menu['food_id']) ?>';">
                                    <img src="./img/foods/<?= h($restaurant_menu['food_image']); ?>" alt="<?= h($restaurant_menu['food_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($restaurant_menu['food_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($restaurant_menu['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-orange mt-auto text-center">￥<?= number_format((int)$restaurant_menu['food_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="cafe-drink" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ カフェ　ドリンク</h4>
                    <div class="row">
                        <?php foreach ($drink as $index => $drinks): ?>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm p-3 item-food-card" onclick="location.href='foodDetail.php?food_id=<?= h($drinks['food_id']) ?>';">
                                    <img src="./img/foods/<?= h($drinks['food_image']); ?>" alt="<?= h($drinks['food_name']); ?>" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($drinks['food_name']); ?></h4>
                                    <p class="text-muted small mb-2 text-center"><?= h($drinks['description']); ?></p>
                                    <p class="font-weight-bold mb-0 text-orange mt-auto text-center">￥<?= number_format((int)$drinks['food_price']); ?><span class="h6"> (税込)</span></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                    <a href="map.php"
                        class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        園内マップ
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="./ticket.php"
                        class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        チケット
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="./index.php" class="btn text-muted font-weight-bold btn-back-home">
            &larr; トップページへ戻る
        </a>
    </div>
    <button id="foodGourmetBtn" class="food-gourmet-btn">🍽️ 今日何食べる？おすすめ抽選</button>

    <div id="foodModal" class="food-modal">
        <div class="food-modal-content">
            <h3 class="h5 font-weight-bold mb-3" style="color:#ff7800;">👨‍🍳 シェフのおすすめメニュー！</h3>
            <div id="modalFoodContainer">
            </div>
            <button id="foodModalCloseBtn" class="btn btn-warning text-white btn-sm mt-3 w-100" style="border-radius:30px; font-weight:bold; background-color:#ff7800; border:none;">他を見る・閉じる</button>
        </div>
    </div>
</main>

<?php
include './temp/footer1.php';
?>

<script src="./js/food.js"></script>
<?php
include './temp/footer2.php';
?>