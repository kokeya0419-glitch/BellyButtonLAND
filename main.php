<?php
include './temp/header.php';
require_once './temp/functions.php';

//グッズランキングの取得
$dbh = db_open();
$sql = 'SELECT * FROM goods ORDER BY sold_count DESC LIMIT 3';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$goods_ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

// アトラクション
$sql = 'SELECT * FROM atraction ';
$stmt = $dbh->prepare($sql);
$stmt->execute();
// 配列にすべてのデータを格納
$atraction_ranking = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 格納したデータから2，4，8を取り出す（回転系）
$spin_number = [2, 4, 8];
$random  = rand(0, 2);
$atraction_spin = $atraction_ranking[$spin_number[$random]];

// echo $spin_number[$random];

// 格納したデータから3,9,10,11を取り出す（ファミリー系）
$family_number = [3, 9, 10, 11];
$random  = rand(0, 3);
$atraction_family = $atraction_ranking[$family_number[$random]];

// echo $family_number[$random];

// 格納したデータから3,9,10,11を取り出す（絶叫系）
$screaming_number = [0, 5, 6, 7];
$random  = rand(0, 3);
$atraction_screaming = $atraction_ranking[$screaming_number[$random]];

echo $screaming_number[$random];



?>


<main class="container mt-5 mb-5">
  <div class="main-video-wrap mb-5">
    <video src="./video/main1.mp4" autoplay loop muted playsinline></video>
  </div>

  <!-- おすすめグッズ -->
  <section id="recommended-items" class="py-5">
    <div class="text-center mb-5">
      <h2 class="section-title">RECOMMENDED ITEMS</h2>
      <p class="section-subtitle">
        BBランド限定！いま大人気のおすすめグッズ
      </p>
    </div>
    <div class="row">
      <?php foreach ($goods_ranking as $index => $goods): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card item-card h-100 border-0 shadow-sm">
            <div class="item-img-box">
              <img
                src="./img/goods/<?= h($goods['goods_image']) ?>.png"
                class="card-img-top"
                alt="<?= h($goods['goods_name']) ?>" />
              <span class="badge-status bg-danger text-white">POPULAR</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-title item-name fs-5 fw-bold">
                <?= h($goods['goods_name']) ?>
              </h3>
              <p
                class="card-text item-price mt-auto fs-5 text-danger fw-bold">
                <?= number_format(h($goods['goods_price'])) ?> <span class="tax-in text-muted fs-6">(税込)</span>
              </p>
              <a href="#online-shop" class="btn btn-add-cart w-100 mt-3">🛒 オンラインで購入</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
    <div class="text-center mt-4">
      <a
        href="#all-items"
        class="btn btn-add-cart px-5 py-3 shadow-sm font-weight-bold">
        その他グッズをもっと見る
      </a>
    </div>
  </section>


  <!--------------------アトラクション紹介-----------------
--------------------------------------------------------->
  <section id="attractions" class="py-5">
    <div class="text-center mb-5">
      <h2 class="section-title">ATTRACTIONS</h2>
      <p class="section-subtitle">
        絶叫系からファミリー向けまで、楽しさ無限大！
      </p>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/atractions/<?= $atraction_spin['atraction_image'] ?>"
              class="card-img-top"
              alt="<?= $atraction_spin['atraction_name'] ?>" />
            <span class="badge-status bg-warning text-dark">回転系</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name fs-5 fw-bold">
              <?= $atraction_spin['atraction_name'] ?>
            </h3>
            <p class="card-text text-muted small mt-2">
              <?= $atraction_spin['description'] ?>
            </p>
            <div class="mt-auto pt-3 border-top text-muted small">
              <span>🧍 身長制限: 120cm以上</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/atractions/<?= $atraction_family['atraction_image'] ?>"
              class="card-img-top"
              alt="<?= $atraction_family['atraction_name'] ?>" />
            <span class="badge-status bg-warning text-dark">ファミリー系</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name fs-5 fw-bold">
              <?= $atraction_family['atraction_name'] ?>
            </h3>
            <p class="card-text text-muted small mt-2">
              <?= $atraction_family['description'] ?>
            </p>
            <div class="mt-auto pt-3 border-top text-muted small">
              <span>🧍 身長制限: 120cm以上</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/atractions/<?= $atraction_screaming['atraction_image'] ?>"
              class=" card-img-top"
              alt="<?= $atraction_screaming['atraction_name'] ?>" />
            <span class="badge-status bg-warning text-dark">絶叫系</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name fs-5 fw-bold">
              <?= $atraction_screaming['atraction_name'] ?>
            </h3>
            <p class="card-text text-muted small mt-2">
              <?= $atraction_screaming['description'] ?>
            </p>
            <div class="mt-auto pt-3 border-top text-muted small">
              <span>🧍 身長制限: 120cm以上</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a
        href="#all-attractions"
        class="btn btn-add-cart px-5 py-3 shadow-sm font-weight-bold">
        アトラクション一覧を見る
      </a>
    </div>
  </section>


  <!-------------------イベント紹介------------------------------------
    -------------------------------------------------------------------->
  <section id="events" class="py-5">
    <div class="text-center mb-5">
      <h2 class="section-title">EVENTS</h2>
      <p class="section-subtitle">
        今しか体験できない！特別なシーズンイベント
      </p>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/event1.jpg"
              class="card-img-top"
              alt="サマーウォーターフェス" />
            <span class="badge-status bg-danger text-white">開催中</span>
          </div>
          <div class="card-body d-flex flex-column">
            <span class="text-muted small mb-1">📅 2026年7月1日 〜 8月31日</span>
            <h3 class="card-title item-name fs-5 fw-bold">
              びしょ濡れ！サマーウォーターフェス2026
            </h3>
            <p class="card-text text-muted small mt-2">
              大量の水が降り注ぐ、夏限定の大迫力ステージショー！家族みんなで思いっきり濡れて涼もう！
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/event1.jpg"
              class="card-img-top"
              alt="サマーウォーターフェス" />
            <span class="badge-status bg-danger text-white">開催中</span>
          </div>
          <div class="card-body d-flex flex-column">
            <span class="text-muted small mb-1">📅 2026年7月1日 〜 8月31日</span>
            <h3 class="card-title item-name fs-5 fw-bold">
              びしょ濡れ！サマーウォーターフェス2026
            </h3>
            <p class="card-text text-muted small mt-2">
              大量の水が降り注ぐ、夏限定の大迫力ステージショー！家族みんなで思いっきり濡れて涼もう！
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img
              src="./img/event1.jpg"
              class="card-img-top"
              alt="サマーウォーターフェス" />
            <span class="badge-status bg-danger text-white">開催中</span>
          </div>
          <div class="card-body d-flex flex-column">
            <span class="text-muted small mb-1">📅 2026年7月1日 〜 8月31日</span>
            <h3 class="card-title item-name fs-5 fw-bold">
              びしょ濡れ！サマーウォーターフェス2026
            </h3>
            <p class="card-text text-muted small mt-2">
              大量の水が降り注ぐ、夏限定の大迫力ステージショー！家族みんなで思いっきり濡れて涼もう！
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a
        href="#all-events"
        class="btn btn-add-cart px-5 py-3 shadow-sm font-weight-bold">
        その他のイベントをすべて見る
      </a>
    </div>
  </section>

</main>

<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>