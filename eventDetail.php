<?php
// ここにページタイトルを入れる
$page_title = 'イベント詳細';
// 💡 詳細ページ専用のCSSを共通ヘッダーに引き渡す設定
$page_css = ['./css/eventDetail.css'];
// 💡 共通のセッションや関数、ヘッダーの上半身を読み込む
include './temp/header.php';
require_once './temp/functions.php';

// GETパラメータからイベントIDを取得
$event_id = $_GET['event_id'] ?? null;

if (!$event_id) {
  echo 'イベントが指定されていません。';
  exit;
}

// イベント一覧データ取得
$dbh = db_open();
$sql = 'SELECT * FROM event WHERE event_id = :event_id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
$stmt->execute();

// データが１つだけなのでfetchを使用！！
$eventItems = $stmt->fetch(PDO::FETCH_ASSOC);

// データが無ければ警告する
if (!$eventItems) {
  echo 'イベントデータが見つかりません';
  exit;
}
?>

<main class="container pb-5 mt-0">
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-transparent p-0">
      <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">HOME</a></li>
      <li class="breadcrumb-item"><a href="event.php" class="text-decoration-none text-muted">イベント一覧</a></li>
      <li class="breadcrumb-item active text-dark font-weight-bold" aria-current="page"><?= h($eventItems['event_name'] ?? 'イベント詳細') ?></li>
    </ol>
  </nav>

  <div class="card border-0 shadow-sm rounded-lg overflow-hidden mb-4">
    <div class="row no-gutters align-items-stretch">

      <div class="col-md-6 bg-white detail-img-container fade-in-item ">
        <img src="./img/events/<?= h($eventItems['event_image'] ?: 'noimage2.png') ?>"
          onerror="this.src='./img/events/noimage2.png'" class="detail-goods-img" alt="イベント画像">
      </div>

      <div class="col-md-6 detail-info-container ">
        <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column fade-in-item">

          <span class="badge badge-danger text-white align-self-start mb-3 px-3 py-2 rounded-pill fs-7 font-weight-bold">
            EVENT ID: <?= h($eventItems['event_id']); ?>
          </span>

          <h1 class="h2 font-weight-bold text-dark mb-2 ">
            <?= h($eventItems['event_name'] ?? '限定イベント') ?>
          </h1>

          <hr class="text-muted my-3">

          <div class="mb-4 fade-in-item">
            <h5 class="h6 font-weight-bold text-secondary mb-2">イベント紹介</h5>
            <p class="text-muted mb-0" style="line-height: 1.6;">
              <?= nl2br(h($eventItems['event_detail'] ?? "期間限定のスペシャルイベントを開催中！パーク内が華やかな装飾に包まれ、この時期だけの特別なショーやフードがお楽しみいただけます。")) ?>
            </p>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="text-center mt-4">
    <a href="event.php" class="btn btn-outline-secondary px-4 py-2 rounded-pill btn-sm">
      ← イベント一覧に戻る
    </a>
  </div>
</main>

<script src="./js/eventdetail.js" defer></script>

<?php
// 💡 共通のフッターを読み込む
include './temp/footer1.php';
include './temp/footer2.php';
?>