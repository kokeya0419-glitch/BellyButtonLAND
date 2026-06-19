<?php
$page_css = ["./css/guzz.css"];
include './temp/header.php';

?>

<main class="container mb-5 goods-main-container">

    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-5">
        <h2 class="section-title goods-title mb-0">グッズ紹介</h2>
        <div class="heart-icon title-heart"></div>
    </div>

    <div class="row">

        <div class="col-lg-9">

            <div id="limited-goods" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title pink-border">
                    限定グッズ
                </h3>
                <div class="row">
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <img src="./img/goods1.jpg" alt="商品画像" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">限定マスコット</h4>
                            <p class="text-muted small mb-2 text-center">ここでしか買えない限定案内</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥1,800</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <img src="./img/logo1.png" alt="商品画像" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">アニバーサリー缶</h4>
                            <p class="text-muted small mb-2 text-center">記念デザインの可愛いお菓子</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥1,500</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <img src="./img/goods2.jpg" alt="商品画像" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">アニバーサリー缶</h4>
                            <p class="text-muted small mb-2 text-center">記念デザインの可愛いお菓子</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥1,500</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ranking" class="mb-5">
                <h3 class="h4 font-weight-bold mb-4 section-sub-title pink-border">
                    👑 売れ筋ランキング
                </h3>
                <div class="row">
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <span class="badge-ranking ranking-1st">1位</span>
                            <img src="./img/rank1.jpg" alt="1位" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">ふわふわミニマスコット</h4>
                            <p class="text-muted small mb-2 text-center">堂々の人気No.1アイテム！</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥1,200</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <span class="badge-ranking ranking-2nd">2位</span>
                            <img src="./img/rank2.jpg" alt="2位" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">プリントクッキー缶</h4>
                            <p class="text-muted small mb-2 text-center">お土産に大人気のお菓子です</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥1,500</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                            <span class="badge-ranking ranking-3rd">3位</span>
                            <img src="./img/rank3.jpg" alt="3位" class="img-circle" />
                            <h4 class="h6 font-weight-bold mb-1 text-center">ロゴ入りTシャツ</h4>
                            <p class="text-muted small mb-2 text-center">みんなでお揃いで着よう！</p>
                            <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥3,200</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="other-goods" class="mb-5 p-4 other-goods-box">
                <h3 class="h4 font-weight-bold mb-5 other-goods-title">
                    その他グッズ
                </h3>

                <div id="sweets-food" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ お菓子・食品</h4>
                    <div class="row">
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods4.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ポップコーンバケット</h4>
                                <p class="text-muted small mb-2 text-center">キャラメル味のポップコーン入り！</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,200</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods4.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ポップコーンバケット</h4>
                                <p class="text-muted small mb-2 text-center">キャラメル味のポップコーン入り！</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,200</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods4.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ポップコーンバケット</h4>
                                <p class="text-muted small mb-2 text-center">キャラメル味のポップコーン入り！</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,200</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="toys" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ ぬいぐるみ・おもちゃ</h4>
                    <div class="row">
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods5.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">BB大型ぬいぐるみ</h4>
                                <p class="text-muted small mb-2 text-center">抱き心地ばつぐんのビッグサイズ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥4,500</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods5.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">BB大型ぬいぐるみ</h4>
                                <p class="text-muted small mb-2 text-center">抱き心地ばつぐんのビッグサイズ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥4,500</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods5.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">BB大型ぬいぐるみ</h4>
                                <p class="text-muted small mb-2 text-center">抱き心地ばつぐんのビッグサイズ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥4,500</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="fashion-items" class="mb-5">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ ファッションアイテム</h4>
                    <div class="row">
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods6.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ロゴトートバッグ</h4>
                                <p class="text-muted small mb-2 text-center">たっぷり入るキャンバス生地バッグ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,500</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods6.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ロゴトートバッグ</h4>
                                <p class="text-muted small mb-2 text-center">たっぷり入るキャンバス生地バッグ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,500</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods6.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">ロゴトートバッグ</h4>
                                <p class="text-muted small mb-2 text-center">たっぷり入るキャンバス生地バッグ</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥2,500</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="apparel" class="mb-3">
                    <h4 class="h5 font-weight-bold mb-4 category-title">・ アパレル</h4>
                    <div class="row">
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods7.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">キッズパーカー</h4>
                                <p class="text-muted small mb-2 text-center">カラフルで元気なキッズサイズアパレル</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥3,800</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods7.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">キッズパーカー</h4>
                                <p class="text-muted small mb-2 text-center">カラフルで元気なキッズサイズアパレル</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥3,800</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-3 item-goods-card">
                                <img src="./img/goods7.jpg" alt="商品画像" class="img-circle" />
                                <h4 class="h6 font-weight-bold mb-1 text-center">キッズパーカー</h4>
                                <p class="text-muted small mb-2 text-center">カラフルで元気なキッズサイズアパレル</p>
                                <p class="font-weight-bold mb-0 text-danger mt-auto text-center">¥3,800</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-3 mt-5 mt-lg-0">
            <div class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="#characters"
                        class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        キャラクター紹介
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="#park-map"
                        class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
                        園内マップ
                    </a>
                </div>
                <div class="flex-grow-1 mx-1 mb-lg-3">
                    <a href="#tickets"
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
</main>
<footer id="footer-info" class="py-5 bg-dark text-white text-center">
    <p class="mb-0">© BBland All Rights Reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/main.js"></script>
</body>

</html>