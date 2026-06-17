// ==========================================
// ヘッダーのスクロール連動処理
// ==========================================
$(window).on('scroll', function () {
  // 20px以上スクロールしたら「is-scrolled」クラスをヘッダーに付与
  if ($(this).scrollTop() > 20) {
    $('#top').addClass('is-scrolled');
  } else {
    $('#top').removeClass('is-scrolled');
  }
});
