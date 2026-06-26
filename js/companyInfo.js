
document.addEventListener('DOMContentLoaded', () => {
  // ==========================================
  // 1. グラデーションアニメーション (既存)
  // ==========================================
  const heroSection = document.querySelector('.bb-hero');
  if (heroSection) {
    const duration = 4000;
    let startTime = null;
    function animateHeroGradient(timestamp) {
      if (!startTime) startTime = timestamp;
      const elapsed = timestamp - startTime;
      const progress = (elapsed % duration) / duration;
      const deg = progress * 360;
      heroSection.style.background = `linear-gradient(${deg}deg, #ffe0e0 0%, #ff7472 50%, #fcd3d3 100%)`;
      requestAnimationFrame(animateHeroGradient);
    }
    requestAnimationFrame(animateHeroGradient);
  }

  // ==========================================
  // 2. タイプライター ＆ 言語切り替え機能 (画面流入トリガー版)
  // ==========================================
  const langBtn = document.getElementById('langToggle');
  let currentLang = 'ja';
  let activeTimers = [];
  let hasTyped = false; // すでにタイピングが実行されたかを管理するフラグ

  const conceptSection = document.querySelector('.bb-concept');
  const typingTargets = document.querySelectorAll(
    '.bb-catchphrase, .bb-concept-text p',
  );

  // タイピングをリセットする関数
  function resetTyping() {
    activeTimers.forEach((timer) => clearTimeout(timer));
    activeTimers = [];
    typingTargets.forEach((el) => {
      el.textContent = '';
      el.classList.remove('typing-cursor');
    });
  }

  // 順番にタイピングを実行していく関数
  function startTypingChain(index = 0) {
    if (index >= typingTargets.length) return;

    const el = typingTargets[index];
    const fullText = el.getAttribute(`data-${currentLang}`) || '';

    let currentIdx = 0;
    el.classList.add('typing-cursor');

    function typeCharacter() {
      if (currentIdx < fullText.length) {
        el.textContent += fullText.charAt(currentIdx);
        currentIdx++;
        const timer = setTimeout(typeCharacter, 40);
        activeTimers.push(timer);
      } else {
        el.classList.remove('typing-cursor');
        startTypingChain(index + 1);
      }
    }
    typeCharacter();
  }

  // 静的要素（タイトルなど）の言語更新用
  function updateStaticElements() {
    document.querySelectorAll('[data-ja]').forEach((el) => {
      if (
        !el.classList.contains('bb-catchphrase') &&
        !el.closest('.bb-concept-text')
      ) {
        el.textContent = el.getAttribute(`data-${currentLang}`);
      }
    });
  }

  // --- 初期設定 ---
  updateStaticElements();
  resetTyping(); // 最初は文字を空にしておく

  // --- 画面に入ったかを監視する設定 (IntersectionObserver) ---
  if (conceptSection) {
    const observerOptions = {
      root: null, // ビューポートを基準にする
      rootMargin: '0px',
      threshold: 0.2, // セクションが20%画面に入ったら発火
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        // 画面内に入り、かつ、まだタイピングが始まっていない場合
        if (entry.isIntersecting && !hasTyped) {
          hasTyped = true; // フラグを立てて2回目以降のスクロールでは発火させない
          startTypingChain();
          observer.unobserve(entry.target); // 監視を解除して軽量化
        }
      });
    }, observerOptions);

    observer.observe(conceptSection); // 企業理念セクションの監視を開始
  }

  // --- 言語切り替えボタンが押された時の処理 ---
  if (langBtn) {
    langBtn.addEventListener('click', () => {
      currentLang = currentLang === 'ja' ? 'en' : 'ja';
      langBtn.textContent = currentLang === 'ja' ? 'English' : '日本語';

      updateStaticElements();

      // もしすでに画面に入ってタイピングされた後なら、その場で再タイピング
      // まだ画面に入っていないなら、文字を空のままにしておく（スクロール時に発火させるため）
      if (hasTyped) {
        resetTyping();
        startTypingChain();
      }
    });
  }
});