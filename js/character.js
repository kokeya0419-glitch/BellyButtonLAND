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
