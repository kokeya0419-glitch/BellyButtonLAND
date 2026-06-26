<?php
// ここにページタイトルを入れる
$page_title = '新規登録';
$page_css = ["./css/login.css"];
require_once 'temp/functions.php';
include 'temp/header.php';
?>

<div id="breadcrumb">
    <ol>
        <li><a href="index.php">ホーム</a>&gt;</li>
        <li>会員登録</li>
    </ol>
</div>

<article>
    <h1>会員登録</h1>
    <div class="contents">
        <form action="./confirm.php" method="POST" class="registration">
            <div class="formFlex">

                <div class="label">
                    <p><label for="user_name">名前</label></p>
                </div>
                <div class="field">
                    <p><input type="text" name="user_name" id="user_name" required autofocus></p>
                </div>

                <div class="label">
                    <p><label for="email">メールアドレス</label></p>
                </div>
                <div class="field">
                    <p><input type="email" name="email" id="email" placeholder="bbland@example.com" required></p>
                </div>

                <div class="label">
                    <p><label for="password">パスワード</label></p>
                </div>
                <div class="field">
                    <p><input type="password" name="password" id="password" placeholder="半角英数字8文字以上" required></p>
                </div>

                <div class="label">
                    <p><label for="post_code">郵便番号</label></p>
                </div>
                <div class="field">
                    <p><input type="text" name="post_code" id="post_code" placeholder="例：123-4567" maxlength="8"></p>
                </div>

                <div class="label">
                    <p><label for="address">住所</label></p>
                </div>
                <div class="field">
                    <p><input type="text" name="address" id="address" placeholder="郵便番号を入力で自動挿入"></p>
                </div>

                <div class="label">
                    <p><label for="tel">電話番号</label></p>
                </div>
                <div class="field">
                    <p><input type="tel" name="tel" id="tel" placeholder="10桁、もしくは11桁"></p>
                </div>

                <div class="label">
                    <p><label for="pinCode">決済認証コード</label></p>
                </div>
                <div class="field">
                    <p><input type="password" name="pinCode" id="pinCode" maxlength="4" minlength="4" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{4}$" placeholder="大文字・小文字・数字をそれぞれ1文字以上" title="4文字の半角英数字で、大文字・小文字・数字をそれぞれ1文字以上含めてください"></p>
                </div>

            </div>
            <p class="text-center">
                <button type="submit">会員登録する</button>
            </p>
        </form>
    </div>

    <script>
        document.getElementById('post_code').addEventListener('blur', function() {
            const postCode = this.value.replace(/[^\d]/g, ''); // 数字のみを抽出

            if (postCode.length !== 7) {
                if (postCode.length > 0) {
                    alert('郵便番号は7桁で入力してください（例：123-4567 または 1234567）');
                }
                return;
            }

            // APIにリクエスト
            searchAddress(postCode);
        });

        async function searchAddress(postCode) {
            try {
                // 方法1: 郵便番号検索API
                const response = await fetch(`https://api.zipaddress.net/?zipcode=${postCode}`, {
                    method: 'GET'
                });

                const data = await response.json();

                if (data.code === 200 && data.data) {
                    const pref = data.data.pref;
                    const city = data.data.city;
                    const address = `${pref}${city}`;
                    document.getElementById('address').value = address;
                    console.log('住所取得成功:', address);
                } else {
                    console.log('住所が見つかりません:', data);
                    alert('郵便番号が見つかりません。手動で住所を入力してください。');
                }
            } catch (error) {
                console.error('検索エラー:', error);
                alert('住所検索に失敗しました。お手数ですが手動で入力してください。');
            }
        }
    </script>
</article>

<?php
include 'temp/footer1.php';
include 'temp/footer2.php';
?>