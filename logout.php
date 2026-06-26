<?php


$page_css = ["./css/login.css"];
include './temp/headerLogout.php';
require_once './temp/functions.php';


//セッション内の配列の値を削除
$_SESSION = array();

//セッション情報を破棄
session_destroy();

//トップページへ遷移
?>

<body class="text-center">
    </div>
    <p>ログアウトしました。</p>
    <p>3秒後にTOPページへ移動します。</p>
    <p>自動で戻らない場合は<a href="./index.php">ここをクリック</a></p>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXv
ZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/popup.js"></script>
</body>

</html>

<?php
include './temp/footer1.php';
?>


<?php
include './temp/footer2.php';
?>