<?php
include './temp/header.php';

?>


<main class="container mt-5 mb-5">
  <div class="main-video-wrap mb-5">
    <video src="./video/main1.mp4" autoplay loop muted playsinline></video>
  </div>

  <section id="recommended-items" class="py-4">
    <div class="text-center mb-5">
      <h2 class="section-title">RECOMMENDED ITEMS</h2>
      <p class="section-subtitle">
        BBランド限定！いま大人気のおすすめグッズ
      </p>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img src="./img/item1.jpg" class="card-img-top" alt="商品1" />
            <span class="badge-status bg-danger text-white">POPULAR</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name">
              BBランドオリジナル ぬいぐるみ
            </h3>
            <p class="card-text item-price mt-auto">
              ¥3,200 <span class="tax-in">(税込)</span>
            </p>
            <a href="" class="btn btn-block btn-add-cart mt-3">🛒 カートに入れる</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img src="./img/item2.jpg" class="card-img-top" alt="商品2" />
            <span class="badge-status bg-warning text-dark">NEW</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name">
              カラフルポップコーンバケット
            </h3>
            <p class="card-text item-price mt-auto">
              ¥2,400 <span class="tax-in">(税込)</span>
            </p>
            <a href="" class="btn btn-block btn-add-cart mt-3">🛒 カートに入れる</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card item-card h-100 border-0 shadow-sm">
          <div class="item-img-box">
            <img src="./img/item3.jpg" class="card-img-top" alt="商品3" />
          </div>
          <div class="card-body d-flex flex-column">
            <h3 class="card-title item-name">
              なりきりカチューシャ（ピンク）
            </h3>
            <p class="card-text item-price mt-auto">
              ¥1,800 <span class="tax-in">(税込)</span>
            </p>
            <a href="" class="btn btn-block btn-add-cart mt-3">🛒 カートに入れる</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>