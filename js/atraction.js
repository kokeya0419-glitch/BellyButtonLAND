// ==========================================
// アトラクション一覧ページの動き
// ==========================================

// ページが読み込まれたら準備OK！
$(document).ready(function () {
  
  // 「magic-heart」という名前をつけたボタンがクリックされたら…
  $('#magic-heart').on('click', function () {
    
    // 「is-liked」という名札（クラス）をつけたり外したりする魔法！
    // これにより、CSSで設定したピンク色に変身します。
    $(this).toggleClass('is-liked');

    // もし名札がついたら（ピンクになったら）
    if ($(this).hasClass('is-liked')) {
      $(this).text('♥'); // 中身を塗りつぶしたハートにする
    } else {
      $(this).text('♡'); // 中身を白抜きのハートに戻す
    }
    
  });

});// ==========================================
// ヘッダーのスクロール連動処理
// ==========================================
// $(window).on('scroll', function () {
//   // 20px以上スクロールしたら「is-scrolled」クラスをヘッダーに付与
//   if ($(this).scrollTop() > 20) {
//     $('#top').addClass('is-scrolled');
//   } else {
//     $('#top').removeClass('is-scrolled');
//   }
// });




document.addEventListener('DOMContentLoaded', () => {
  // --- 既存のグラデーションやタイプライターのコードの下に追加してください ---

  // アニメーション対象の要素をすべて取得
  const animateElements = document.querySelectorAll('.bb-animate');

  if (animateElements.length > 0) {
    const observerOptions = {
      root: null,
      rootMargin: '0px 0px -30px 0px', // 画面下部より少し手前で発火
      threshold: 0,
    };

    const observer = new IntersectionObserver((entries, observer) => {
      let delayCounter = 0;

      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const target = entry.target;

          // 同時に画面内に入った要素がある場合、0.15秒ずつずらして表示
          setTimeout(() => {
            target.classList.add('is-visible');
          }, delayCounter * 250);

          delayCounter++;

          // 一度表示されたら監視を解除する
          observer.unobserve(target);
        }
      });
    }, observerOptions);

    // すべての対象要素を監視に登録
    animateElements.forEach((el) => observer.observe(el));
  }
});