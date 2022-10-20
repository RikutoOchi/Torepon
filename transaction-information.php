<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/tra-info.css" />

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <div class="tr-info">
            <div class="info-title">
                <h1>トレード情報</h1>
            </div>
            <div class="item-info">
                <div class="item-img">
                    <img src="images/kuma1.jpg">
                </div>
                <div class="counter-info">
                    <img class="counter-icon" src="images/userIcon.png">
                    <p class="counter-name">取引相手の名前</p>
                    <p class="counter-id">取引相手のID</p>
                </div>
                <div class="item-deta">
                    <p>商品タイトル</p>
                    <p>商品名</p>
                    <p>商品コンディション</p>
                    <p>必要チケット種類・枚数</p>
                </div>
                <div class="delivery-address">
                    <p>お届け先</p>
                </div>
            </div>
        </div>
      </section>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
