document.addEventListener('DOMContentLoaded', () => {
  // 💡 順番に表示させたい要素に共通のクラス（.fade-in-item）を付けておき、一斉に取得
  const fadeItems = document.querySelectorAll('.fade-in-item');

  fadeItems.forEach((item, index) => {
    // 💡 順番に応じて遅延時間を計算（0番目: 0s, 1番目: 0.15s, 2番目: 0.3s...）
    item.style.animationDelay = `${index * 0.3}s`;

    // 💡 アニメーションを起動するクラスを追加
    item.classList.add('is-visible');
  });
});
