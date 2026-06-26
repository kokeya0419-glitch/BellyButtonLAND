<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once __DIR__ . '/functions.php';
$cartCount = count($_SESSION['cart'] ?? []);
?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BBland</title>

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./css/bgm.css" />

  <!-- 選択したcssが表示される -->
  <?php if (!empty($page_css)) : ?>
    <?php foreach ($page_css as $css): ?>
      <link rel="stylesheet" href="<?= h($css) ?>">
    <?php endforeach; ?>

  <?php endif; ?>
  <!-- ログインcss -->
  <!-- <link rel="stylesheet" href="./css/login.css"> -->
  <!-- アトラクションcss -->
  <!-- <link rel="stylesheet" href="./css/attraction.css"> -->
  <!-- グッズcss -->
  <!-- <link rel="stylesheet" href="./css/guzz.css"> -->
  <!-- フードcss -->
  <!-- <link rel="stylesheet" href="./css/food.css"> -->
  <link rel="stylesheet" type="text/css" href="./css/css/page.css">
</head>
</head>


<body>
  <header
    id="top"
    class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm py-2 px-4">
    <div class="header-left d-flex align-items-center">
      <h1 class="logo mb-0 mr-3">
        <a href="./index.php"><img src="./img/logo2.png" alt="BBlandロゴ" /></a>
      </h1>
      <h2 class="bb-welcome mb-0 d-none d-md-block">ようこそBBランドへ</h2>
    </div>

    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <nav class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav mt-3 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./attraction.php">アトラクション</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="./guzz.php">グッズ</a></li>
        <li class="nav-item">
          <a class="nav-link" href="./food.php">フード＆カフェ</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="./event.html">イベント</a></li>
        <li class="nav-item"><a class="nav-link" href="./contact.php">問合せ</a></li>

        <li class="nav-item ml-lg-4 w-100-sm">
          <a class="nav-link nav-login" href="./mypage.php"><?php echo h($_SESSION['user_name'] ?? 'ゲスト'); ?>さん</a>
        </li>
        <!-- ログイン状態に応じてログインかログアウトか変わる -->
        <?php if (!empty($_SESSION['login'])) : ?>
          <li class="nav-item ml-lg-4 w-100-sm">
            <a class="nav-link nav-login" href="./logout.php">ログアウト</a>
          </li>
        <?php else : ?>
          <li class="nav-item ml-lg-4 w-100-sm">
            <a class="nav-link nav-login" href="./login.php">👤 ログイン</a>
          </li>
        <?php endif; ?>

        <li class="nav-item ml-lg-2 w-100-sm">
          <a class="nav-link nav-cart" href="./cart.php">
            🛒 カート <span class="badge badge-pill badge-light ml-1"><?= h($cartCount) ?></span>
          </a>
        </li>
      </ul>
    </nav>
  </header>