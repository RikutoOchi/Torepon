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