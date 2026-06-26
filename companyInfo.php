<?php
// ここにページタイトルを入れる
$page_title = '会社概要';
// 💡 詳細ページ専用のCSSを共通ヘッダーに引き渡す設定
$page_css = ['./css/companyInfo.css'];
// ※ header.php の中に共通化データの <head> から </header> までが入っている想定です
include './temp/header.php';
require_once './temp/functions.php';

?>
<button id="langToggle" class="lang-btn">English</button>

<main class="bb-company-profile">
  <section class="bb-hero">
    <h1 class="bb-title" data-ja="COMPANY PROFILE" data-en="COMPANY PROFILE">COMPANY PROFILE</h1>
    <p class="bb-subtitle" data-ja="会社概要" data-en="Company Profile">会社概要</p>
  </section>

  <section class="bb-section bb-concept">
    <div class="bb-container">
      <h2 class="bb-section-title" data-ja="企業理念" data-en="Corporate Philosophy">企業理念</h2>
      <p class="bb-catchphrase" data-ja="「ココロとお腹のまんなかに、最高のワクワクを。」" data-en="“The ultimate excitement, right at the center of your heart and belly.”">「ココロとお腹のまんなかに、最高のワクワクを。」</p>
      <div class="bb-concept-text">
        <p data-ja="BellyButton（おへそ）は、すべての人が生まれ持つ「身体の中心」であり、かつて大切な人と繋がっていた「絆の証」です。"
          data-en="The BellyButton is the center of the body that everyone is born with, and a symbol of the bond that once connected us to someone precious.">BellyButton（おへそ）は、すべての人が生まれ持つ「身体の中心」であり、かつて大切な人と繋がっていた「絆の証」です。</p>
        <p data-ja="私たちBellyButtonLANDは、世界の中心（おへそ）となるような、誰もが温かい気持ちになれるテーマパークを運営しています。"
          data-en="We, BellyButtonLAND, operate a theme park that aims to be the center (the belly button) of the world, where everyone can feel warm and happy.">私たちBellyButtonLANDは、世界の中心（おへそ）となるような、誰もが温かい気持ちになれるテーマパークを運営しています。</p>
        <p data-ja="日常のストレスを忘れ、お腹（おへそ）の底から笑い合える非日常の空間を提供し、人と人、心と心を繋ぐエンターテインメントを創造し続けます。"
          data-en="Forget daily stress and laugh from the bottom of your belly in our extraordinary space. We continue to create entertainment that connects people and hearts.">日常のストレスを忘れ、お腹（おへそ）の底から笑い合える非日常の空間を提供し、人と人、心と心を繋ぐエンターテインメントを創造し続けます。</p>
      </div>
    </div>
  </section>

  <section class="bb-section bb-value">
    <div class="bb-container">
      <h2 class="bb-section-title" data-ja="私たちの提供する価値" data-en="Our Value">私たちの提供する価値</h2>
      <div class="bb-grid col-12">
        <div class="bb-card">
          <div class="bb-card-icon">📱</div>
          <h3 data-ja="直感的なUI/UX" data-en="Intuitive UI/UX">直感的なUI/UX</h3>
          <p data-ja="来園されるお客様がスムーズに、かつ期待を膨らませながら入場できるよう、スマートフォンに最適化されたレスポンシブWebデザインを採用しています。"
            data-en="We use responsive web design optimized for smartphones so that visitors can enter smoothly with growing expectations.">来園されるお客様がスムーズに、かつ期待を膨らませながら入場できるよう、スマートフォンに最適化されたレスポンシブWebデザインを採用しています。</p>
        </div>
        <div class="bb-card">
          <div class="bb-card-icon">🔒</div>
          <h3 data-ja="安心の完全予約制" data-en="Complete Reservation System">安心の完全予約制</h3>
          <p data-ja="チケットはすべて「日付ごとの完全予約制（リアルタイム在庫判定システム）」を導入。混雑を未然に防ぎ、安心・安全なパーク運営のDXを自社システムで実現しています。"
            data-en="All tickets use a date-specific complete reservation system (real-time inventory check). This prevents crowding and achieves secure park DX through our in-house system.">チケットはすべて「日付ごとの完全予約制（リアルタイム在庫判定システム）」を導入。混雑を未然に防ぎ、安心・安全なパーク運営のDXを自社システムで実現しています。</p>
        </div>
      </div>
    </div>
  </section>

</main>
<?php
// 💡 共通のフッター（<footer>から</html>まで）を読み込む

include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>