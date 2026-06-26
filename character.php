<?php
// ここにページタイトルを入れる
$page_title = 'キャラクター';
$page_css = ["./css/character.css"];

require_once './temp/functions.php';
include './temp/header.php';
?>
<!-- ボーダーライン -->
<div class="chara-placed-area text-center mt-5"></div>

<main class="container py mt-5">
  <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-5">
    <h2 class="section-title goods-title mb-0">キャラクター紹介</h2>
    <!-- <div class="heart-icon title-heart"></div> -->
  </div>
  <div class="row">
    <!-- <div class="col-lg-9">
      <h2 class="mb-4">キャラクター紹介</h2>
      <hr class="mb-4"> -->
    <div class="col-lg-9">
      <div class="char-item">
        <img src="./img/4.jpg" class="char-img" alt="ニッシーマウス">
        <div class="char-info">
          <h3 class="char-name">ニッシーマウス</h3>
          <p>BellyButtonLANDのムードメーカー「ニッシーマウス」がついに登場！おふざけ大好きでみんなを笑顔にする一方、実は真面目で努力家な一面も。釣りやスポーツやゲームなど趣味が豊富。ちょっぴり人見知りなネズミの男の子です。彼のチャームポイントである可愛い前歯と、お茶目な魅力をぜひチェックしてください！</p>
        </div>
      </div>

      <div class="char-item">
        <div class="char-info">
          <h3 class="char-name">マコンツェル</h3>
          <p>髪は長〜く、夢は高〜く！自由を夢見るおっとり癒やし系プリンス「マコンツェル」が登場！真面目で、実はちょっぴり人見知りな一面も。キャンプのことなら私にまかせて！！のんびりマイペースな男の子（？）です。長すぎる髪の毛とお茶目な表情が魅力的な、彼との素敵な冒険をぜひお楽しみください！</p>
        </div>
        <img src="./img/1.jpg" class="char-img" alt="マコンツェル">
      </div>

      <div class="char-item">
        <img src="./img/2.jpg" class="char-img" alt="ポムポムヒデリン">
        <div class="char-info">
          <h3 class="char-name">ポムポムヒデリン</h3>
          <p>おひさま大好き！女性大好き！おっとり癒やし系の男の子「ポムポムヒデリン」が登場！のんびり優しく、みんなに好かれる明るい性格です。夜ご飯は毎日3号食べる大食いな一面や、競輪好きという意外な特徴も。チャームポイントのふわふわなしっぽと、まるいおなかに癒やされること間違いなしの可愛いキャラクターです！</p>
        </div>
      </div>

      <div class="char-item">
        <div class="char-info">
          <h3 class="char-name">ヨッシー</h3>
          <p>BellyButtonLANDに恐竜のマスコット「ヨォシィ」がやってきた！やさしくて知的、好奇心いっぱいなユタラプトルの男の子です。メガネと赤色のとさかがチャームポイント。趣味はゲーム！大好物のおにくとたまごクッションに囲まれ、きょうりゅうの研究や読書を一生けんめい頑張る姿に癒やされること間違いなしです！</p>
        </div>
        <img src="./img/3.jpg" class="char-img" alt="ヨッシー">
      </div>
    </div>


    <div class="col-lg-3">
      <div class="side-nav-sticky" style="top: 100px;">
        <a href="./map.php" class="nav-btn">園内マップ</a>
        <a href="./ticket.php" class="nav-btn">チケット</a>
      </div>
    </div>
  </div>
  </div>

  <div class="text-center mb-5">
    <a href="./index.php" class="btn text-muted font-weight-bold btn-back-home">
      &larr; トップページへ戻る
    </a>
  </div>
</main>
<?php
include './temp/footer1.php';
include './temp/footer2.php';
?>