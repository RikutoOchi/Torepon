//ハンバーガーメニュー
$(".burger-btn").on("click", function () {
  $(".humburger-nav").toggleClass("active");
  $(this).toggleClass("cross");
});

//headerセレクト
$(".header-select").on("click", function () {
  $(".header-select").toggleClass("opened");
});

//headerセレクト
$(".header-select").on("click", function () {
  $(".header-select").toggleClass("opened");
});

//絞り込み表示非表示アニメーション
$(".disp-search").on("click", function () {
  $(".searchBy-list").toggleClass("none");
  $(this).toggleClass("nodisp");
});

//ログイン画面アニメーション
$(".email_text")
  .focus(function () {
    // console.log("focus");
    $(".email_box").animate(
      {
        borderTopColor: "rgb(237, 117, 101);",
        borderLeftColor: "rgb(237, 117, 101);",
        borderRightColor: "rgb(237, 117, 101);",
        borderBottomColor: "rgb(237, 117, 101);",
      },
      200
    );
  })
  .blur(function () {
    $(".email_box").animate(
      {
        borderTopColor: "#000",
        borderLeftColor: "#000",
        borderRightColor: "#000",
        borderBottomColor: "#000",
      },
      200
    );
  });

$(".password_text")
  .focus(function () {
    $(".password_box").animate(
      {
        borderTopColor: "rgb(237, 117, 101);",
        borderLeftColor: "rgb(237, 117, 101);",
        borderRightColor: "rgb(237, 117, 101);",
        borderBottomColor: "rgb(237, 117, 101);",
      },
      200
    );
  })
  .blur(function () {
    $(".password_box").animate(
      {
        borderTopColor: "#000",
        borderLeftColor: "#000",
        borderRightColor: "#000",
        borderBottomColor: "#000",
      },
      200
    );
  });

//モーダル表示
$(".modal-open").modaal({
  overlay_close: true, //モーダル背景クリック時に閉じるか
  before_open: function () {
    // モーダルが開く前に行う動作
    $("html").css("overflow-y", "hidden"); /*縦スクロールバーを出さない*/
  },
  after_close: function () {
    // モーダルが閉じた後に行う動作
    $("html").css("overflow-y", "scroll"); /*縦スクロールバーを出す*/
  },
});
