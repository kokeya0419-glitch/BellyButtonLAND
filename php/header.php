<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BellyButtonLAND</title>
</head>

<body>
    <header id="top">   
        <h1></h1>
        <p></p>
        <div class="userArea">
            <div class="account">
                <?php
                if(!empty($_SESSION['login'])){
                    $loginName = $_SESSION['user_name'];
                    echo '<p class="accountName">' . $loginName . '様&nbsp;<a href="logout.php"><i class="fas fa-sign-out-alt"></i></p>';
                } else {
                    $loginName = 'ゲスト';
                    echo '<p class="accountName">' . $loginName . '様</p>';
                    echo '<p class="logout"><a href="login.php">[会員ログイン]</a></p>';
                }
                ?>
            </div>
        </div>

    </header>
</body>
</html>