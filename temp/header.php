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
  <link rel="stylesheet" href="\uto2026\BellyButtonLAND\style.css" />
  <link rel="stylesheet" href="./css/style.css">
</head>


<body>
  <header
    id="top"
    class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm py-2 px-4">
    <div class="header-left d-flex align-items-center">
      <h1 class="logo mb-0 mr-3">
        <a href="./main.php"><img src="./img/logo2.png" alt="BBlandロゴ" /></a>
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
          <a class="nav-link" href="./atraction.php">アトラクション</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="./goods.html">グッズ</a></li>
        <li class="nav-item">
          <a class="nav-link" href="./foods.html">フード＆カフェ</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="./event.html">イベント</a></li>
        <li class="nav-item"><a class="nav-link" href="./contact.html">問合せ</a></li>

        <li class="nav-item ml-lg-4 w-100-sm">
          <a class="nav-link nav-login" href="./login.php">👤 ログイン</a>
        </li>

        <li class="nav-item ml-lg-2 w-100-sm">
          <a class="nav-link nav-cart" href="./cart.html">
            🛒 カート <span class="badge badge-pill badge-light ml-1">4</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>