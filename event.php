<?php
// ここにページタイトルを入れる
$page_title = 'イベント';
$page_css = ["./css/event.css", "./css/foodcafe.css"];
require_once './temp/functions.php';
include './temp/header.php';

// イベントのデータを取得する処理
$dbh = db_open();
$sql = 'SELECT * FROM event ORDER BY RAND()';
$stmt = $dbh->prepare($sql);
$stmt->execute();
// 連想配列を変数に格納する
$eventArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($eventArray);

array_rand($eventArray, 3);

// var_dump(array_rand($eventArray, 3));
// $event_id = $eventArray['event_id'];

// $event_name = $eventArray['event_name'];
// $event_description = $eventArray['description'];
// $event_detail = $eventArray['event_detail'];
// $event_image = $eventArray['event_image'];
// $date_start = $eventArray['date_start'];

?>
<style>
    .backImage {
        position: fixed;
        top: -50px;
        z-index: -1;
        opacity: 0.2;
    }
</style>
<div class="backImage">
    <img src="./img/backImg/ys.png">
</div>

<div class="chara-placed-area text-center mt-5"></div>

<main class="container mb-5 food-main-container">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-5">
        <h2 class="section-title food-title mb-0">イベント紹介</h2>
        <!-- <div class="heart-icon title-heart"></div> -->
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <!-- ループ処理 -->
                <?php foreach ($eventArray as $event) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card event-card h-100 border-0 shadow-sm p-3" onclick="location.href='eventDetail.php?event_id=<?= h($event['event_id']) ?>';">
                            <div class="img-box event-img-box">
                                <img src="./img/events/<?= $event['event_image'] ?>"
                                    onerror="this.src='./img/events/noimage2.png'"
                                    alt="<?= $event['event_name'] ?>" />
                            </div>
                            <div class="event-body d-flex flex-column h-0">
                                <h4 class="font-weight-bold mb-2 event-name"><?= $event['event_name'] ?></h4>
                                <p class="text-muted small mb-3 event-description"><?= $event['description'] ?></p>
                                <p class="font-weight-bold mb-0 event-period mt-auto">期間：<?= $event['date_start']  ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- <div class="col-md-6 mb-4">
                    <div class="card event-card h-100 border-0 shadow-sm p-3">
                        <div class="img-box event-img-box">
                            <img src="./img/event2.jpg" alt="イベント画像" />
                        </div>
                        <div class="event-body d-flex flex-column h-0">
                            <h4 class="font-weight-bold mb-2 event-name">キャラクターミート＆グリート</h4>
                            <p class="text-muted small mb-3 event-description">新キャラクターがBBランドに仲間入り！期間限定で特別なお出迎えと記念撮影を実施します。</p>
                            <p class="font-weight-bold mb-0 event-period mt-auto">期間：2026年7月10日 〜 7月20日</p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 mb-4">
                    <div class="card event-card h-0 border-0 shadow-sm p-3">
                        <div class="img-box event-img-box">
                            <img src="./img/events/event_2.png" alt="イベント画像" />
                        </div>
                        <div class="event-body d-flex flex-column h-0">
                            <h4 class="font-weight-bold mb-2 event-name">BBランド謎解きトレジャー</h4>
                            <p class="text-muted small mb-3 event-description">パーク内に隠された謎を解き明かして、限定オリジナルピンバッジを手に入れよう！家族みんなで挑戦できます。</p>
                            <p class="font-weight-bold mb-0 event-period mt-auto">期間：2026年8月1日 〜 8月15日</p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 mb-4">
                    <div class="card event-card h-0 border-0 shadow-sm p-3">
                        <div class="img-box event-img-box">
                            <img src="./img/event4.jpg" alt="イベント画像" />
                        </div>
                        <div class="event-body d-flex flex-column h-0">
                            <h4 class="font-weight-bold mb-2 event-name">ひんやりフードフェスティバル</h4>
                            <p class="text-muted small mb-3 event-description">夏にぴったりの冷たいスイーツや、スパイシーなスタミナメニューが各レストランに大集合！</p>
                            <p class="font-weight-bold mb-0 event-period mt-auto">期間：2026年7月15日 〜 8月20日</p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 mb-4">
                    <div class="card event-card h-0 border-0 shadow-sm p-3">
                        <div class="img-box event-img-box">
                            <img src="./img/event5.jpg" alt="イベント画像" />
                        </div>
                        <div class="event-body d-flex flex-column h-0">
                            <h4 class="font-weight-bold mb-2 event-name">夕暮れのトワイライトパス割引</h4>
                            <p class="text-muted small mb-3 event-description">16時以降の入園がとってもお得になるスペシャルキャンペーン。学校帰りや仕事終わりにもおすすめです。</p>
                            <p class="font-weight-bold mb-0 event-period mt-auto">期間：2026年7月1日 〜 8月31日</p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 mb-4">
                    <div class="card event-card h-0 border-0 shadow-sm p-3">
                        <div class="img-box event-img-box">
                            <img src="./img/event6.jpg" alt="イベント画像" />
                        </div>
                        <div class="event-body d-flex flex-column h-0">
                            <h4 class="font-weight-bold mb-2 event-name">SNSフォトコンテスト</h4>
                            <p class="text-muted small mb-3 event-description">ハッシュタグをつけてパークの思い出を投稿しよう！優秀賞には次回のペアパスポートをプレゼント。</p>
                            <p class="font-weight-bold mb-0 event-period mt-auto">期間：2026年6月1日 〜 8月31日</p>
                        </div>
                    </div>
                </div> -->

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
                    <a href="./map.php"
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
</main>
<!-- 
    <footer id="footer-info" class="py-5 bg-dark text-white text-center">
        <p class="mb-0">&copy; BBland All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="event.js"></script>
</body>

</html> -->


<?php
// 💡 共通のフッター（<footer>から</html>まで）を読み込む

include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>