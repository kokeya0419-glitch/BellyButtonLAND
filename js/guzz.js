document.addEventListener('DOMContentLoaded', () => {
  // ==========================================
  // 機能1: 迷わせない！ランダムグッズ抽選（回遊向上）
  // ==========================================
  const omikujiBtn = document.getElementById('omikujiBtn');
  const goodsModal = document.getElementById('goodsModal');
  const modalCloseBtn = document.getElementById('modalCloseBtn');
  const modalItemContainer = document.getElementById('modalItemContainer');

  // 現在のページ内にあるすべての商品カード情報を自動収集
  const collectGoods = () => {
    const cards = document.querySelectorAll('.item-goods-card');
    const goodsList = [];

    cards.forEach((card) => {
      // onclick属性からURLを取り出す（例: location.href='goodsdetail.php?goods_id=3'）
      const clickAttr = card.getAttribute('onclick') || '';
      const urlMatch = clickAttr.match(/'([^']+)'/);
      const url = urlMatch ? urlMatch[1] : '#';

      const img = card.querySelector('img')
        ? card.querySelector('img').src
        : '';
      const name = card.querySelector('h4')
        ? card.querySelector('h4').textContent
        : '';
      const price = card.querySelector('.text-danger')
        ? card.querySelector('.text-danger').textContent
        : '';

      goodsList.push({ url, img, name, price });
    });
    return goodsList;
  };

  if (omikujiBtn && goodsModal) {
    omikujiBtn.addEventListener('click', () => {
      const allItems = collectGoods();
      if (allItems.length === 0) return;

      // ランダムで1つ選択
      const randomItem = allItems[Math.floor(Math.random() * allItems.length)];

      // ポップアップ内を生成（クリックしたらそのまま詳細ページに飛べる）
      modalItemContainer.innerHTML = `
        <div style="cursor:pointer;" onclick="location.href='${randomItem.url}'">
          <img src="${randomItem.img}" class="modal-item-img" alt="${randomItem.name}">
          <h4 class="h6 font-weight-bold mb-2">${randomItem.name}</h4>
          <p class="font-weight-bold text-danger mb-0">${randomItem.price}</p>
          <small class="text-muted d-block mt-2">👉 タップして詳細を見る</small>
        </div>
      `;

      goodsModal.classList.add('is-open');
    });

    modalCloseBtn.addEventListener('click', () => {
      goodsModal.classList.remove('is-open');
    });

    // 背景をクリックしても閉じるようにする
    goodsModal.addEventListener('click', (e) => {
      if (e.target === goodsModal) goodsModal.classList.remove('is-open');
    });
  }

  // ==========================================
  // 機能2: トップへ戻るボタンスムーズスクロール
  // ==========================================
  const scrollTopBtn = document.getElementById('scrollTopBtn');
  if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
      // 300px以上スクロールしたらボタンを表示
      if (window.scrollY > 300) {
        scrollTopBtn.classList.add('is-active');
      } else {
        scrollTopBtn.classList.remove('is-active');
      }
    });

    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth', // スムーズにスクロール
      });
    });
  }

  // // ==========================================
  // // 機能3: ブラウザ誤操作による完全離脱防止（ページアウト警告）
  // // ==========================================
  // // ユーザーが一度でもページ内をスクロール、またはクリックした場合、
  // // ページを完全に閉じようとした時・別サイトへ行こうとした時に確認ダイアログを出します
  // window.addEventListener('beforeunload', (event) => {
  //   // 完全にサイト外に出るのを防ぐための標準ブラウザ警告
  //   // ※最近のブラウザではカスタムメッセージを表示せず標準文言になりますが、誤操作防止に有効です
  //   event.preventDefault();
  //   event.returnValue = '';
  // });
});
