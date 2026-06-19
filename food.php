<?php
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
foreach([7,8,9,16,17,18] as $id){
    $drink[] = $foods[$id];
}

?>

<main class="container mb-5 food-main-container">

    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-5">
        <h2 class="section-title food-title mb-0">フード＆カフェ紹介</h2>
        <div class="heart-icon title-heart"></div>
    </div>

    <div class="row">
        <div class="col-lg-9">

            <div id="limited-food" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title orange-border">
                    限定フード・ドリンク
                </h3>
                <div class="row">
                    <!-- 配列をforeachで回す -->
                    <?php foreach ($limitedFoods as $foods): ?>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                <img src="./img/foods/<?= h($foods['food_image']); ?>" alt="<?= h($foods['food_name']) ?>" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($foods['food_name']); ?></h4>
                                <p class="text-muted small mb-2 text-center"><?= h($foods['description']); ?></p>
                                <p class="font-weight-bold mb-0 text-orange mt-auto text-center"><?= number_format(h($foods['food_price'])); ?>円(税込)</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                            <img src="./img/foods/food3.jpg" alt="商品画像" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">商品画像</h4>
                            <p class="text-muted small mb-2 text-center">可愛いラテアートが選べます</p>
                            <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥650</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                            <img src="./img/food3.jpg" alt="商品画像" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">キャラクターラテ</h4>
                            <p class="text-muted small mb-2 text-center">可愛いラテアートが選べます</p>
                            <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥650</p>
                        </div>
                    </div> -->
                </div>
            </div>

                    <div id="ranking" class="mb-5">
                        <h3 class="h4 font-weight-bold mb-4 section-sub-title orange-border">
                            👑 売れ筋ランキング
                        </h3>
                        <div class="row">
                            <?php foreach ($foods_ranking as $index => $fr): ?>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <span class="badge-ranking ranking-<?= $index + 1 ?>st"><?= $index + 1 ?></span>
                                        <img src="./img/foods/<?= h($fr['food_image']); ?>" alt="<?= h($fr['food_name']); ?>" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($fr['food_name']); ?></h4>
                                        <p class="text-muted small mb-2 text-center"><?= h($fr['description']); ?></p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center"><?= number_format((int)$fr['food_price']); ?>円(税込)</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- <div class="col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                    <span class="badge-ranking ranking-2nd">2位</span>
                                    <img src="./img/food_rank2.jpg" alt="2位" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center">ポップコーンレギュラーバケット</h4>
                                    <p class="text-muted small mb-2 text-center">定番のキャラメル味＆お土産ケース</p>
                                    <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥2,200</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 mb-4">
                                <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                    <span class="badge-ranking ranking-3rd">3位</span>
                                    <img src="./img/food_rank3.jpg" alt="3位" class="img-circle" />
                                    <h4 class="h6 font-weight-bold mb-1 text-center">カラフルソーダポップ</h4>
                                    <p class="text-muted small mb-2 text-center">パチパチ弾ける爽快ドリンク</p>
                                    <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥600</p>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div id="other-foods" class="mb-5 p-4 other-food-box">
                        <h3 class="h4 font-weight-bold mb-5 other-food-title">
                            その他フード＆カフェ
                        </h3>

                        <div id="sweets-snack" class="mb-5">
                            <h4 class="h5 font-weight-bold mb-4 category-title">・ 食べ歩き・スイーツ</h4>
                            <div class="row">
                                <?php foreach ($cafe as $index => $cafe_food): ?>
                                    <div class="col-md-4 col-6 mb-4">
                                        <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                            <img src="./img/foods/<?= h($cafe_food['food_image']); ?>" alt="<?= h($cafe_food['food_name']); ?>" class="img-circle" />
                                            <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($cafe_food['food_name']); ?></h4>
                                            <p class="text-muted small mb-2 text-center"><?= h($cafe_food['description']); ?></p>
                                            <p class="font-weight-bold mb-0 text-orange mt-auto text-center"><?= number_format((int)$cafe_food['food_price']); ?>円(税込)</p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food4.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">ふんわりクレープ</h4>
                                        <p class="text-muted small mb-2 text-center">いちごたっぷりの王道クレープ</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥680</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food4.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">ふんわりクレープ</h4>
                                        <p class="text-muted small mb-2 text-center">いちごたっぷりの王道クレープ</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥680</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div id="restaurant" class="mb-5">
                            <h4 class="h5 font-weight-bold mb-4 category-title">・ レストラン・がっつり</h4>
                            <div class="row">
                                <?php foreach ($restaurant as $index => $restaurant_menu): ?>
                                    <div class="col-md-4 col-6 mb-4">
                                        <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                            <img src="./img/foods/<?= h($restaurant_menu['food_image']); ?>" alt="<?= h($restaurant_menu['food_name']); ?>" class="img-circle" />
                                            <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($restaurant_menu['food_name']); ?></h4>
                                            <p class="text-muted small mb-2 text-center"><?= h($restaurant_menu['description']); ?></p>
                                            <p class="font-weight-bold mb-0 text-orange mt-auto text-center"><?= number_format((int)$restaurant_menu['food_price']); ?>円(税込)</p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food5.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">本格デミグラスオムライス</h4>
                                        <p class="text-muted small mb-2 text-center">卵がとろとろの絶品プレート</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥1,280</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food5.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">本格デミグラスオムライス</h4>
                                        <p class="text-muted small mb-2 text-center">卵がとろとろの絶品プレート</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥1,280</p>
                                    </div>
                                </div>-->
                            </div>
                        </div>

                        <div id="cafe-drink" class="mb-5">
                            <h4 class="h5 font-weight-bold mb-4 category-title">・ カフェ・ドリンク</h4>
                            <div class="row">
                                <?php foreach($drink as $index => $drinks): ?>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/foods/<?= h($drinks['food_image']); ?>" alt="<?= h($drinks['food_name']); ?>" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center"><?= h($drinks['food_name']); ?></h4>
                                        <p class="text-muted small mb-2 text-center"><?= h($drinks['description']); ?></p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center"><?= number_format((int)$drinks['food_price']); ?>円(税込)</p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food6.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">自家製ハニーレモネード</h4>
                                        <p class="text-muted small mb-2 text-center">すっきり爽やかハチミツの甘み</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥580</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food6.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">自家製ハニーレモネード</h4>
                                        <p class="text-muted small mb-2 text-center">すっきり爽やかハチミツの甘み</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥580</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- <div id="popcorn" class="mb-3">
                            <h4 class="h5 font-weight-bold mb-4 category-title">・ ポップコーン</h4>
                            <div class="row">
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food7.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">リフィルポップコーン</h4>
                                        <p class="text-muted small mb-2 text-center">おかわり専用！各種フレーバー</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥600</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food7.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">リフィルポップコーン</h4>
                                        <p class="text-muted small mb-2 text-center">おかわり専用！各種フレーバー</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥600</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm p-3 item-food-card">
                                        <img src="./img/food7.jpg" alt="商品画像" class="img-circle" />
                                        <h4 class="h6 font-weight-bold mb-1 text-center">リフィルポップコーン</h4>
                                        <p class="text-muted small mb-2 text-center">おかわり専用！各種フレーバー</p>
                                        <p class="font-weight-bold mb-0 text-orange mt-auto text-center">¥600</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>

                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
                        <div class="flex-grow-1 mx-1 mb-lg-3">
                            <a href="index.html#characters"
                                class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                                キャラクター紹介
                            </a>
                        </div>
                        <div class="flex-grow-1 mx-1 mb-lg-3">
                            <a href="index.html#park-map"
                                class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                                園内マップ
                            </a>
                        </div>
                        <div class="flex-grow-1 mx-1 mb-lg-3">
                            <a href="index.html#tickets"
                                class="btn w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
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
</main>
<!-- 
    <footer id="footer-info" class="py-5 bg-dark text-white text-center">
        <p class="mb-0">© BBland All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="food.js"></script>
</body>

</html> -->

<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>