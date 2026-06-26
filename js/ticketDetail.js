$(document).ready(function () {
    /* ==========================================
       1. ヘッダーのスクロール連動処理
       ========================================== */
    // $(window).on('scroll', function () {
    //     if ($(this).scrollTop() > 20) {
    //         $('#top').addClass('is-scrolled');
    //     } else {
    //         $('#top').removeClass('is-scrolled');
    //     }
    // });

    /* ==========================================
       2. タイトル横のハート切り替え
       ========================================== */
    $('.title-heart').on('click', function () {
        $(this).toggleClass('active');

        const heartSvg = $(this).find('.heart-icon');

        if ($(this).hasClass('active')) {
            heartSvg.attr('fill', '#ef476f');
            heartSvg.html('<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>');
        } else {
            heartSvg.attr('fill', 'currentColor');
            heartSvg.html('<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>');
        }
    });

    /* ==========================================
       3. 画像モーダル処理
       ========================================== */
    if ($.fn.modaal) {
    $(".gallery-list").modaal({
        fullscreen: true,
        before_open: function () {
            $('html').css('overflow-y', 'hidden');
        },
        after_close: function () {
            $('html').css('overflow-y', 'scroll');
        }
    });
}

    /* ==========================================
       4. チケット数量ボタン処理
       ========================================== */
    $('.detail-quantity').each(function () {
        const row = $(this);
        const btnMinus = row.find('.btn-minus');
        const btnPlus = row.find('.btn-plus');
        const qtyInput = row.find('.qty-input');

        btnMinus.on('click', function () {
            let currentValue = parseInt(qtyInput.val(), 10);

            if (currentValue > 0) {
                qtyInput.val(currentValue - 1);
            }
        });

        btnPlus.on('click', function () {
            let currentValue = parseInt(qtyInput.val(), 10);

            if (currentValue < 10) {
                qtyInput.val(currentValue + 1);
            }
        });
    });
});