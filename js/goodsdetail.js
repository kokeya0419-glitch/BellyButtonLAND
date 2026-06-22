/**
 * 📦 商品詳細ページ 専用スクリプト
 * 数量選択の「＋」「ー」ボタンの制御
 */
document.addEventListener('DOMContentLoaded', function () {
  const minusBtn = document.getElementById('btn-minus');
  const plusBtn = document.getElementById('btn-plus');
  const quantityInput = document.getElementById('quantity-input');

  // 要素が存在することを確認（エラー防止）
  if (minusBtn && plusBtn && quantityInput) {
    // マイナスボタンをクリックしたときの処理
    minusBtn.addEventListener('click', function () {
      let currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    });

    // プラスボタンをクリックしたときの処理
    plusBtn.addEventListener('click', function () {
      let currentValue = parseInt(quantityInput.value);
      let maxValue = parseInt(quantityInput.getAttribute('max')) || 10; // 属性がなければ最大10個
      if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
      }
    });
  }
});
