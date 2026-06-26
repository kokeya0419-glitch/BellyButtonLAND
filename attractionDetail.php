<?php
// ここにページタイトルを入れる
$page_title = 'アトラクション詳細';
// 💡 詳細ページ専用のCSSを共通ヘッダーに引き渡す設定
$page_css = ['./css/goodsdetail.css'];
// ※ header.php の中に共通化データの <head> から </header> までが入っている想定です
include './temp/header.php';
require_once './temp/functions.php';
// 💡 共通のセッションや関数、ヘッダーの上半身を読み込む
$atraction_id = $_GET['atraction_id'];
// $atraction_id = 8;
// echo $goods_id;
//アトラクション一覧データ取得
$dbh = db_open();
$sql = 'SELECT * FROM atraction WHERE atraction_id = :atraction_id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':atraction_id', $atraction_id, PDO::PARAM_INT);
$stmt->execute();
// echo $stmt;
// データが１つだけなのでfetctを使用！！
$atractionItems = $stmt->fetch(PDO::FETCH_ASSOC);
//データが無ければ警告する
// var_dump($atractionItems);
if (!$atractionItems) {
  echo 'アトラクションデータが見つかりません';
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
      <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">HOME</a></li>
      <li class="breadcrumb-item"><a href="attraction.php" class="text-decoration-none text-muted">アトラクション一覧</a></li>
      <li class="breadcrumb-item active text-dark font-weight-bold" aria-current="page"><?= h($atractionItems['atraction_name'] ?? '限定グッズ') ?></li>
    </ol>
  </nav>

  <div class="card border-0 shadow-sm rounded-lg overflow-hidden mb-4">
    <div class="row no-gutters align-items-stretch">

      <div class="col-md-6 bg-white detail-img-container">
        <img src="./img/atractions/<?= h($atractionItems['atraction_image'] ?? 'goods1') ?>" class="detail-goods-img" alt="商品画像">
      </div>

      <div class="col-md-6 detail-info-container">
        <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">
          <span class="badge badge-danger text-white align-self-start mb-3 px-3 py-2 rounded-pill fs-7 font-weight-bold"><?= h($atractionItems['sub_id']); ?></span>
          <h1 class="h2 font-weight-bold text-dark mb-2"><?= h($atractionItems['atraction_name'] ?? 'BBランド限定ポップコーンバケット') ?></h1>

          <!-- 価格 -->
          <!-- <p class="h2 text-danger font-weight-bold mb-4">
            ¥<?= number_format(h($goodsItem['goods_price'] ?? 3200)) ?> <span class="h6 text-muted">(税込)</span>
          </p> -->

          <hr class="text-muted my-3">

          <div class="mb-4">
            <h5 class="h6 font-weight-bold text-secondary mb-2">乗り物紹介</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
              <?= nl2br(h($atractionItems['description2'] ?? "BBランドの開園を記念して作られた、特別な限定ポップコーンバケットです！\nパーク内での持ち歩きはもちろん、お部屋のインテリアとしてもワクワクするポップなデザインに仕上がっています。ベルト部分には取り外し可能な可愛いロゴチャーム付き。")) ?>
            </p>
          </div>



        </div>
      </div>

    </div>
  </div>

  <div class="text-center mt-4">
    <a href="attraction.php" class="btn btn-outline-secondary px-4 py-2 rounded-pill btn-sm">
      ← アトラクション一覧に戻る
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