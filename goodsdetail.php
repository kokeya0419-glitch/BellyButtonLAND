<?php
// 💡 詳細ページ専用のCSSを共通ヘッダーに引き渡す設定
$page_css = ['./css/goodsdetail.css'];
// ※ header.php の中に共通化データの <head> から </header> までが入っている想定です
include './temp/header.php';
require_once './temp/functions.php';
// 💡 共通のセッションや関数、ヘッダーの上半身を読み込む
$goods_id = $_GET['goods_id'];
// echo $goods_id;
//グッズ一覧データ取得
$dbh = db_open();
$sql = 'SELECT * FROM goods WHERE goods_id = :goods_id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':goods_id', $goods_id,PDO::PARAM_INT);
$stmt->execute();
// echo $stmt;
// データが１つだけなのでfetctを使用！！
$goodsItem = $stmt->fetch(PDO::FETCH_ASSOC);
//商品が無ければ警告する
if(!$goodsItem){
  echo '商品が見つかりません';
  exit;
}
// var_dump($goodsItem);
// echo $goodsItem['goods_id'];
// $goodsItem = $goodsArray['goods_id'];
// echo $goodsItem['goods_id'];
?>

<main class="container py-5 mt-5">
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-transparent p-0">
      <li class="breadcrumb-item"><a href="main.php" class="text-decoration-none text-muted">HOME</a></li>
      <li class="breadcrumb-item"><a href="guzz.php" class="text-decoration-none text-muted">グッズ一覧</a></li>
      <li class="breadcrumb-item active text-dark font-weight-bold" aria-current="page"><?= h($goodsItem['goods_name'] ?? '限定グッズ') ?></li>
    </ol>
  </nav>

  <div class="card border-0 shadow-sm rounded-lg overflow-hidden mb-4">
    <div class="row no-gutters align-items-stretch">

      <div class="col-md-6 bg-white detail-img-container">
        <img src="./img/goods/<?= h($goodsItem['goods_image'] ?? 'goods1') ?>.png" class="detail-goods-img" alt="商品画像">
      </div>

      <div class="col-md-6 detail-info-container">
        <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">

          <span class="badge badge-danger text-white align-self-start mb-3 px-3 py-2 rounded-pill fs-7 font-weight-bold"><?= h($goodsItem['status']); ?></span>
          <h1 class="h2 font-weight-bold text-dark mb-2"><?= h($goodsItem['goods_name'] ?? 'BBランド限定ポップコーンバケット') ?></h1>

          <p class="h2 text-danger font-weight-bold mb-4">
            ¥<?= number_format(h($goodsItem['goods_price'] ?? 3200)) ?> <span class="h6 text-muted">(税込)</span>
          </p>

          <hr class="text-muted my-3">

          <div class="mb-4">
            <h5 class="h6 font-weight-bold text-secondary mb-2">商品説明</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
              <?= nl2br(h($goodsItem['description'] ?? "BBランドの開園を記念して作られた、特別な限定ポップコーンバケットです！\nパーク内での持ち歩きはもちろん、お部屋のインテリアとしてもワクワクするポップなデザインに仕上がっています。ベルト部分には取り外し可能な可愛いロゴチャーム付き。")) ?>
            </p>
          </div>

          <div class="mt-auto">
            <form action="cart.php" method="POST">
              <input type="hidden" name="goods_id" value="<?= h($goodsItem['goods_id']) ?>">

              <div class="form-row align-items-center mb-4">
                <div class="col-auto">
                  <span class="font-weight-bold text-secondary small">数量</span>
                </div>
                <div class="col-auto">
                  <div class="input-group quantity-selector rounded-pill overflow-hidden border">
                    <div class="input-group-prepend">
                      <button class="btn btn-link text-dark text-decoration-none px-3 py-2 bg-light border-0" type="button" id="btn-minus">
                        <span class="font-weight-bold" style="font-size: 14px;">－</span>
                      </button>
                    </div>
                    <!-- 数量の送信 -->
                    <input type="number" name="quantity" id="quantity-input" class="form-control border-0 text-center bg-white font-weight-bold h5 mb-0" value="1" min="1" max="<?= $goodsItem['stock']; ?>" readonly style="width: 60px; height: 100%;">
                    <div class="input-group-append">
                      <button class="btn btn-link text-dark text-decoration-none px-3 py-2 bg-light border-0" type="button" id="btn-plus">
                        <span class="font-weight-bold" style="font-size: 14px;">＋</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- カートに入れるボタン -->
              <div class="form-group mb-0">
                <button type="submit" class="btn btn-danger btn-block btn-lg py-3 font-weight-bold rounded-pill shadow-sm bg-cart-btn">
                  🛒 カートに入れる
                </button>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="text-center mt-4">
    <a href="guzz.php" class="btn btn-outline-secondary px-4 py-2 rounded-pill btn-sm">
      ← グッズ一覧に戻る
    </a>
  </div>
</main>

<script src="./js/goodsdetail.js" defer></script>

<?php
// 💡 共通のフッター（<footer>から</html>まで）を読み込む

include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>