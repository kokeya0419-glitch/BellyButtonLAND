<?php
// ここにページタイトルを入れる
$page_title = 'マップ';
// css読込み
$page_css = ["./css/attraction.css", "./css/map.css"];
include './temp/header.php';
require_once './temp/functions.php';
?>

<div class="chara-placed-area text-center mt-5"></div>
<main class="container mb-5 food-main-container">
  <div class="row">
    <div class="col-lg-9">
      <div class="mb-4 border-bottom pb-3 d-flex justify-content-between align-items-center">
        <h2 class="attraction-page-title">ガイドマップ</h2>
        <!-- <span class="h3">♥</span> -->
      </div>

      <section class="mb-5">
        <img src="./img/map.jpg" alt="ガイドマップ"
          class="img-fluid w-100 border rounded">
      </section>
      <section class="mt-5">
        <h3 class="font-weight-bold mb-4">エリア別での楽しみ方</h3>

        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm category-card">
              <h4 class="category-title mb-3">・メインを楽しみたい</h4>
              <div class="category-badge mb-3">BBエンジョイエリア</div>
              <ul class="attraction-list">
                <li><span class="list-num">①</span> カルデラ・バースト</li>
                <li><span class="list-num">②</span> タイガーブローン・スプラッシュ</li>
                <li><span class="list-num">③</span> メリーモーランド</li>
                <li><span class="list-num">④</span> 武者返し</li>
                <li><span class="list-num">⑤</span> 観覧車</li>

              </ul>
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm category-card">
              <h4 class="category-title mb-3">・家族で楽しみたい</h4>
              <div class="category-badge1 mb-3">チアフル・タウンエリア</div>
              <ul class="attraction-list">
                <li><span class="list-num">⑩</span> どんぐりコロコロ</li>
                <li><span class="list-num">⑪</span> ニコニコ・ラフティング</li>
                <li><span class="list-num">⑫</span> ファンタジーカップ</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm category-card">
              <h4 class="category-title mb-3">・絶叫を楽しみたい</h4>
              <div class="category-badge2 mb-3">パニックゾーンエリア</div>
              <ul class="attraction-list">
                <li><span class="list-num">⑥</span> 神隠し</li>
                <li><span class="list-num">⑦</span> ヤマタノオロチ</li>
                <li><span class="list-num">⑧</span> クロスファイアー</li>
                <li><span class="list-num">⑨</span> グラビティ・ゼロ</li>

              </ul>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 p-4 border-0 shadow-sm category-card">
              <h4 class="category-title mb-3">・イベントや食事を楽しみたい</h4>
              <div class="category-badge3 mb-3">カーニバルセンターエリア</div>
              <ul class="attraction-list">
                <li><span class="list-num">A</span> オフィシャルグッズストア</li>
                <li><span class="list-num">B</span> キャッスルビューカフェ</li>
                <li><span class="list-num">C</span> BBランドレストラン</li>
                <li><span class="list-num">D</span> イベントスペース</li>
              </ul>
            </div>
          </div>
        </div>

      </section>
      <!-- <div class="text-center text-md-left mt-5 mb-5">
        <a href="index.html" class="btn text-muted font-weight-bold p-0" style="text-decoration: underline;">
          &larr; トップページへ戻る
        </a>
      </div> -->
    </div>
    <!-- サイド -->
    <div class="col-lg-3 mt-5 mt-lg-0">
      <div
        class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
        <div class="flex-grow-1 mx-1 mb-lg-3">
          <a
            href="./character.php"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
            キャラクター紹介
          </a>
        </div>

        <div class="flex-grow-1 mx-1 mb-lg-3">
          <a
            href="./ticket.php"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
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
</main>

<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>