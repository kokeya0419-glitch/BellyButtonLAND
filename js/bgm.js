const bgm = document.getElementById("bgm");
const popup = document.getElementById("bgmPopup");
const playBtn = document.getElementById("playBgm");
const closeBtn = document.getElementById("closePopup");
const bgmBtn = document.getElementById("bgmBtn");

let isPlaying = false;

// ============================================
// F5 / Ctrl + F5 / 更新ボタンでリロードされた場合
// BGMの再生位置を削除して、最初から再生させる
// ============================================
const navEntries = performance.getEntriesByType("navigation");

if (navEntries.length > 0 && navEntries[0].type === "reload") {
    localStorage.removeItem("bgmTime");
}

// 保存していた再生位置を復元
const savedTime = localStorage.getItem("bgmTime");
if (savedTime) {
    bgm.currentTime = Number(savedTime);
}

// ============================================
// 前回のBGM設定を取得
// on  → 自動再生
// off → 再生しない＆ポップアップも表示しない
// null → 初めて来た人なのでポップアップを表示
// ============================================

const bgmSetting = localStorage.getItem("bgm");

// ------------------------------
// 前回「再生する」を押した人
// ------------------------------
if (bgmSetting === "on") {

    // ポップアップを隠す
    popup.style.display = "none";

    // BGMを再生
    bgm.play().then(() => {
        isPlaying = true;
        bgmBtn.textContent = "BGM OFF";
    }).catch(() => {

        // ブラウザに自動再生を止められた場合だけ
        popup.style.display = "flex";

    });

    // ------------------------------
    // 前回「あとで」を押した人
    // ------------------------------
} else if (bgmSetting === "off") {

    // ポップアップを表示しない
    popup.style.display = "none";

    // ------------------------------
    // 初めてサイトに来た人
    // ------------------------------
} else {

    // ポップアップを表示
    popup.style.display = "flex";

}

// 「はい」
playBtn.addEventListener("click", () => {
    bgm.play();
    isPlaying = true;
    bgmBtn.textContent = "BGM OFF";
    popup.style.display = "none";
    localStorage.setItem("bgm", "on");
});

// 「あとで」
closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
    localStorage.setItem("bgm", "off");
});

// ON/OFFボタン
bgmBtn.addEventListener("click", () => {
    if (isPlaying) {
        bgm.pause();
        bgmBtn.textContent = "BGM ON";
        localStorage.setItem("bgm", "off");
    } else {
        bgm.play();
        bgmBtn.textContent = "BGM OFF";
        localStorage.setItem("bgm", "on");
    }

    isPlaying = !isPlaying;
});

// 再生位置を保存
setInterval(() => {
    localStorage.setItem("bgmTime", bgm.currentTime);
}, 1000);

// ページを離れる直前にも保存
window.addEventListener("beforeunload", () => {
    localStorage.setItem("bgmTime", bgm.currentTime);
});
