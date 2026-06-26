// ==========================================
// ヘッダーのスクロール連動処理
// ==========================================
$(window).on('scroll', function () {
  // 20px以上スクロールしたら「is-scrolled」クラスをヘッダーに付与
  if ($(this).scrollTop() > 0) {
    $('#top').addClass('is-scrolled');
  } else {
    $('#top').removeClass('is-scrolled');
  }
});

// ==========================================
// mein.php　カードをふわっと表示する処理
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      // 画面内に入ったら 'show' クラスをつける
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      }
    });
  }, {
    threshold: 0.1 // カードが10%見えたらアニメーションを開始
  });

  // アニメーションさせたいカード（グッズ、アトラクション、イベント）を取得
  const cards = document.querySelectorAll('#recommended-items .col-md-6, #attractions .col-md-6, #events .col-md-6');
  
  cards.forEach((card, index) => {
    // 1つずつズレて表示されるように遅延（delay）を設定
    const delay = (index % 3) * 150; // 横並び3つの中で0ms, 150ms, 300msとズラす
    card.style.transitionDelay = `${delay}ms`;
    card.classList.add('fade-in-up'); // 初期状態のクラスを付与
    observer.observe(card); // 監視スタート
  });
});