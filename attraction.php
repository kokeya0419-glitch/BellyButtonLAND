<?php
$page_css = ["./css/attraction.css"];
require_once './temp/functions.php';
include './temp/header.php';

$dbh = db_open();

//BBエンジョイエリアの配列を格納
$sql = 'SELECT * FROM atraction WHERE main_id = :main_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':main_id', 'ＢＢエンジョイエリア', PDO::PARAM_STR);
$stmt->execute();
$enjoy_area = $stmt->fetchAll(PDO::FETCH_ASSOC);

//パニックゾーンエリアの配列を格納
$sql = 'SELECT * FROM atraction WHERE main_id = :main_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':main_id', 'パニックゾーンエリア', PDO::PARAM_STR);
$stmt->execute();
$panic_area = $stmt->fetchAll(PDO::FETCH_ASSOC);

//チアフルタウンエリアの配列を格納
$sql = 'SELECT * FROM atraction WHERE main_id = :main_id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':main_id', 'チアフル・タウンエリア', PDO::PARAM_STR);
$stmt->execute();
$cheerful_area = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="container mt-5 mb-5 pt-lg-4">
  <div class="mb-5 border-bottom pb-3">
    <h2 class="attraction-page-title">アトラクション 一覧</h2>
  </div>

  <div class="row">
    <div class="col-lg-9">
      <section class="mb-5">
        <h3 class="area-title mb-4">BBエンジョイエリア</h3>
        <div class="row">
          <?php foreach($enjoy_area as $index => $enjoy): ?>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/atractions/<?= h($enjoy['atraction_image']); ?>"
                    alt="<?= h($enjoy['atraction_name']); ?>" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      <?= h($enjoy['atraction_name']); ?>
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      <?= h($enjoy['description']); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/dream-carousel.jpg"
                    alt="ドリーム・カルーセル" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      ドリーム・カルーセル
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      ライトアップが美しい2階建て馬車。
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/bb-theater.jpg"
                    alt="BBワンダーシアター" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      BBワンダーシアター
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      風と水が飛び出す五感シアター！
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/kids-playland.jpg"
                    alt="キッズ・プレイランド" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      キッズ・プレイランド
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      小さなお子様が安心して遊べる屋内広場。
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </section>

      <section class="mb-5">
        <h3 class="area-title mb-4">パニックゾーンエリア</h3>
        <div class="row">
          <?php foreach($panic_area as $index => $panic): ?>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img src="./img/atractions/<?= h($panic['atraction_image']); ?>" alt="<?= h($panic['atraction_name']); ?>" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      <?= $panic['atraction_name']; ?>
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      <?= h($enjoy['description']); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/cliff-drop.jpg"
                    alt="クリフ・シャウト・ドロップ" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      クリフ・シャウト・ドロップ
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      高さ15mの滝つぼに垂直落下の急流下り！
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img src="./img/witch-house.jpg" alt="魔女の隠れ家" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      魔女の隠れ家
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      3D音響を駆使した新感覚ホラーハウス。
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img src="./img/vertical-tower.jpg" alt="BB垂直タワー" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      BB垂直タワー
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      一瞬の無重力を体感する絶叫フリーフォール！
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </section>

      <section class="mb-5">
        <h3 class="area-title mb-4">チアフルタウンエリア</h3>
        <div class="row">
          <?php foreach($cheerful_area as $index => $cheerful): ?>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/atractions/<?= h($cheerful['atraction_image']); ?>"
                    alt="<?= h($cheerful['atraction_name']); ?>" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      <?= h($cheerful['atraction_name']); ?>
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      <?= h($cheerful['description']); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/animal-train.jpg"
                    alt="アニマルロード・トレイン" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      アニマルロード・トレイン
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      可愛い動物列車に乗って街をゆっくり周遊。
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/sky-balloon.jpg"
                    alt="スカイバルーン・レース" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      スカイバルーン・レース
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      カラフルな気球に乗ってふわふわ空中散歩。
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card attraction-horizontal-card shadow-sm border-0">
              <div class="row no-gutters h-100 align-items-center">
                <div class="col-4 card-img-wrap">
                  <img
                    src="./img/cheerful-gokart.jpg"
                    alt="チアフル・ゴーカート" />
                </div>
                <div class="col-8">
                  <div class="card-body py-2 px-3">
                    <h4 class="card-title h6 font-weight-bold mb-1">
                      チアフル・ゴーカート
                    </h4>
                    <p class="card-text text-muted small mb-0">
                      本格的なコースを駆け抜ける爽快ドライブ！
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </section>

      <div class="text-center text-md-left mt-5 mb-5">
        <a
          href="index.html"
          class="btn text-muted font-weight-bold p-0"
          style="text-decoration: underline">
          &larr; トップページへ戻る
        </a>
      </div>
    </div>
    <!-- サイドバー -->
    <div class="col-lg-3 mt-5 mt-lg-0">
      <div
        class="sticky-top d-flex flex-row flex-lg-column justify-content-between sidebar-sticky">
        <div class="flex-grow-1 mx-1 mb-lg-3">
          <a
            href="#characters"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
            キャラクター紹介
          </a>
        </div>
        <div class="flex-grow-1 mx-1 mb-lg-3">
          <a
            href="#park-map"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
            園内マップ
          </a>
        </div>
        <div class="flex-grow-1 mx-1 mb-lg-3">
          <a
            href="#tickets"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
            チケット
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<footer id="footer-info" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
        <h3
          class="footer-logo mb-3"
          style="font-weight: 900; color: #ff7675; letter-spacing: 0.05em">
          BBland
        </h3>
        <p class="small text-muted">
          夢と冒険が詰まったポップな世界へようこそ！<br />
          オンラインショップでは、パークで大人気の限定グッズをいつでもどこからでもお買い求めいただけます。
        </p>
      </div>
      <div class="col-md-4 mb-4 mb-md-0 text-center">
        <h5
          class="small font-weight-bold mb-3"
          style="color: #fff1c5; letter-spacing: 0.08em">
          EXPLORE
        </h5>
        <ul class="list-unstyled footer-links small">
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">グッズ</a>
          </li>
          <li class="mb-2">
            <a
              href="attractions.html"
              class="text-secondary text-decoration-none">アトラクション</a>
          </li>
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">フード＆カフェ</a>
          </li>
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">イベント</a>
          </li>
        </ul>
      </div>
      <div class="col-md-4 text-center text-md-right">
        <h5
          class="small font-weight-bold mb-3"
          style="color: #fff1c5; letter-spacing: 0.08em">
          HELP & INFO
        </h5>
        <ul class="list-unstyled footer-links small">
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">お問い合わせ</a>
          </li>
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">特定商取引法に基づく表記</a>
          </li>
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">プライバシーポリシー</a>
          </li>
          <li class="mb-2">
            <a href="" class="text-secondary text-decoration-none">利用規約</a>
          </li>
        </ul>
      </div>
    </div>
    <hr
      class="my-4"
      style="border-top: 1px solid rgba(255, 255, 255, 0.1)" />
    <div class="text-center small text-muted">
      &copy; 2026 BBland All Rights Reserved.
    </div>
  </div>
</footer>

<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
  crossorigin="anonymous"></script>
<script
  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
  crossorigin="anonymous"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
  crossorigin="anonymous"></script>
<script src="./js/main.js"></script>
</body>

</html>