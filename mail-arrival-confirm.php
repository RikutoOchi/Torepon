<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/mailconfirm.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        

        <!-- 到着が未完了と完了時で表示を切り替える -->
        <!-- 出品者側の画面 -->
        <!-- 出品者側は発送が完了した時点でアンケート評価 -->
      <div class="center">
        <h1 class="none sub-ttl ">〇〇(商品名)は発送中です。</h1>
        <h1 class="sub-ttl">〇〇(商品名)は発送完了しました。</h1>
      </div>
       <!-- /到着が未完了と完了時で表示を切り替える -->
       <div class="btn-block">
        <a class="q-btn" href="./questionnaire-form.php">評価する</a>
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
