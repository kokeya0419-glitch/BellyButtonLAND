<?php
require_once './temp/functions.php';
include './temp/header.php';
?>

<main class="container py-5 mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card error-card text-center">
        <span class="error-icon">⚠</span>
        <h2 class="error-title">認証に失敗しました</h2>
        <p class="error-message">
          ピンコードが正しくないか、有効期限が切れています。<br>
          ご確認の上、もう一度お試しください。
        </p>

        <a href="confirmOrder.php" class="btn btn-retry">再入力する</a>
        <div class="mt-3">
          <a href="index.php" class="text-muted small">トップページへ戻る</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require_once './temp/footer1.php';
require_once './temp/footer2.php';
