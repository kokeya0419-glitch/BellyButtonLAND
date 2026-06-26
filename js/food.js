document.addEventListener('DOMContentLoaded', () => {
  // ==========================================
  // 演出1: カードから湯気＆おいしい香りが出るエフェクト
  // ==========================================
  const foodCards = document.querySelectorAll('.item-food-card');

  // 湯気や香りを表す美味しい絵文字リスト
  const steamEmojis = ['♨', '✨', '😋', '🍖', '🍔', '🍰', '🍦', '🥤', '🍕'];

  foodCards.forEach((card) => {
    // マウスが動いた時、またはスマホでタップされた時にエフェクトを発生させる
    card.addEventListener('mousemove', (e) => {
      // 発生する確率を少し制限してチカチカしすぎないようにする（ランダム値）
      if (Math.random() > 0.15) return;

      createSteam(card, e);
    });

    // スマホ対応：タッチされた時にも1個だす
    card.addEventListener(
      'touchstart',
      (e) => {
        createSteam(card, e.touches[0]);
      },
      { passive: true },
    );
  });

  function createSteam(card, event) {
    const steam = document.createElement('span');
    steam.classList.add('steam-effect');

    // ランダムに絵文字をチョイス
    steam.textContent =
      steamEmojis[Math.floor(Math.random() * steamEmojis.length)];

    // カード内の相対的なマウス位置を計算して、そこから立ち上がらせる
    const rect = card.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;

    steam.style.left = `${x}px`;
    steam.style.top = `${y - 40}px`; // 少し上から出現させる

    // ゆらゆらさせるために左右のブレをランダムに設定
    const randomX = (Math.random() - 0.5) * 60; // -30px 〜 +30px
    steam.style.setProperty('--random-x', `${randomX}px`);

    card.appendChild(steam);

    // アニメーションが終わったら自動で消去する（メモリ対策）
    steam.addEventListener('animationend', () => {
      steam.remove();
    });
  }

  // ==========================================
  // 演出2: 「今日何食べる？」ランダム抽選機能
  // ==========================================
  const gourmetBtn = document.getElementById('foodGourmetBtn');
  const foodModal = document.getElementById('foodModal');
  const foodModalCloseBtn = document.getElementById('foodModalCloseBtn');
  const modalFoodContainer = document.getElementById('modalFoodContainer');

  // ページ内のフードデータを自動収集
  const collectFoods = () => {
    const cards = document.querySelectorAll('.item-food-card');
    const menuList = [];

    cards.forEach((card) => {
      const clickAttr = card.getAttribute('onclick') || '';
      const urlMatch = clickAttr.match(/'([^']+)'/);
      const url = urlMatch ? urlMatch[1] : '#';

      const img = card.querySelector('img')
        ? card.querySelector('img').src
        : '';
      const name = card.querySelector('h4')
        ? card.querySelector('h4').textContent
        : '';
      const price = card.querySelector('.text-orange')
        ? card.querySelector('.text-orange').textContent
        : '';

      menuList.push({ url, img, name, price });
    });
    return menuList;
  };

  if (gourmetBtn && foodModal) {
    gourmetBtn.addEventListener('click', () => {
      const allMenus = collectFoods();
      if (allMenus.length === 0) return;

      // ランダムでメニューを選択
      const randomMenu = allMenus[Math.floor(Math.random() * allMenus.length)];

      // モーダルの中身を作成
      modalFoodContainer.innerHTML = `
        <div style="cursor:pointer; padding: 10px;" onclick="location.href='${randomMenu.url}'">
          <img src="${randomMenu.img}" class="modal-food-img" alt="${randomMenu.name}">
          <h4 class="h6 font-weight-bold mb-2" style="font-size:1.1rem; color:#333;">${randomMenu.name}</h4>
          <p class="font-weight-bold text-orange mb-0" style="font-size:1.2rem; color:#ff7800;">${randomMenu.price}</p>
          <small class="text-muted d-block mt-3" style="background:#fff9f2; padding:5px; border-radius:10px;">モーグモーグ！美味しそう！🤤<br>👉 タップしてメニュー詳細を見る</small>
        </div>
      `;

      foodModal.classList.add('is-open');
    });

    foodModalCloseBtn.addEventListener('click', () => {
      foodModal.classList.remove('is-open');
    });

    foodModal.addEventListener('click', (e) => {
      if (e.target === foodModal) foodModal.classList.remove('is-open');
    });
  }
});
