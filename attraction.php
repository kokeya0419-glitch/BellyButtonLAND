<?php
// ここにページタイトルを入れる
$page_title = 'アトラクション';
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
// var_dump($enjoy_area);

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
<style>
  .backImage {
    position: fixed;
    top: 0px;
    left: 50%;
    transform: translateX(-50%);
    z-index: -1;
    opacity: 0.2;
  }

  .backImage img {
    width: 1800px;
  }
</style>
<div class="backImage">
  <img src="./img/backImg/nm.png">
</div>

<!-- ボーダーライン -->
<div class="chara-placed-area text-center mt-5"></div>

<main class="container  mb-5 ">
  <div class=" mb-5 border-bottom pb-3">
    <h2 class="attraction-page-title">アトラクション 一覧</h2>
  </div>

  <div class="row">
    <div class="col-lg-9">
      <!-- <section class="mb-5">
        <h3 class="area-title mb-4">BBエンジョイエリア</h3>

        <div class="row">
          <?php foreach ($enjoy_area as $index => $enjoy): ?>
            <div class="col-md-6 mb-4">
              <div class="card attraction-horizontal-card shadow-sm border-0"
                onclick="location.href='attractionDetail.php?atraction_id=<?= h($enjoy['atraction_id']) ?>';">
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
        </div>
      </section> -->

      <section class="mb-5 bb-fade-section">
        <h3 class="area-title mb-4 bb-animate fade-up">BBエンジョイエリア</h3>

        <div class="row">
          <?php foreach ($enjoy_area as $index => $enjoy): ?>
            <?php $fadeDirection = ($index % 2 === 0) ? 'fade-left' : 'fade-right'; ?>

            <div class="col-md-6 mb-4 bb-animate <?= $fadeDirection; ?>">
              <div class="card attraction-horizontal-card shadow-sm border-0"
                onclick="location.href='attractionDetail.php?atraction_id=<?= h($enjoy['atraction_id']) ?>';">
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
        </div>
      </section>
      <section class="mb-5">
        <h3 class="area-title mb-4 bb-animate fade-up">パニックゾーンエリア</h3>

        <div class="row">
          <?php foreach ($panic_area as $index => $panic): ?>
            <?php $fadeDirection = ($index % 2 === 0) ? 'fade-left' : 'fade-right'; ?>

            <div class="col-md-6 mb-4 bb-animate <?= $fadeDirection; ?>">
              <div class="card attraction-horizontal-card shadow-sm border-0"
                onclick="location.href='attractionDetail.php?atraction_id=<?= h($panic['atraction_id']) ?>';">
                <div class="row no-gutters h-100 align-items-center">
                  <div class="col-4 card-img-wrap">
                    <img src="./img/atractions/<?= h($panic['atraction_image']); ?>" alt="<?= h($panic['atraction_name']); ?>" />
                  </div>
                  <div class="col-8">
                    <div class="card-body py-2 px-3">
                      <h4 class="card-title h6 font-weight-bold mb-1">
                        <?= h($panic['atraction_name']); ?>
                      </h4>
                      <p class="card-text text-muted small mb-0">
                        <?= h($panic['description']); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="mb-5">
        <h3 class="area-title mb-4 bb-animate fade-up">チアフルタウンエリア</h3>

        <div class="row">
          <?php foreach ($cheerful_area as $index => $cheerful): ?>
            <?php $fadeDirection = ($index % 2 === 0) ? 'fade-left' : 'fade-right'; ?>

            <div class="col-md-6 mb-4 bb-animate <?= $fadeDirection; ?>">
              <div class="card attraction-horizontal-card shadow-sm border-0"
                onclick="location.href='attractionDetail.php?atraction_id=<?= h($cheerful['atraction_id']) ?>';">
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
        </div>
      </section>

    </div>
    <!-- サイドバー -->
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
            href="map.php"
            class="btn btn-add-cart w-100 py-3 shadow-sm font-weight-bold text-center d-block btn-sidebar">
            園内マップ
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
  <div class="text-center mt-5 mb-5">
    <a
      href="index.php"
      class="btn text-muted font-weight-bold p-0"
      style="text-decoration: underline">
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