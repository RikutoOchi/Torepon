<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/chat.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->
    <main class="main-side-content">
      <section class="main-content">
    </dl>
    <!-- /mainコンテンツ -->

    <!--追加-->
  <div class="kaiwa imessage">
    <div class="fukidasi left">
      メッセージ                         
    </div>
    <div class="fukidasi right notail">
      メッセージ
    </div>
    <div class="fukidasi right">
      メッセージ
    </div>
  </div>
    <div class="my-message">
    <textarea rows="8" cols="100"></textarea>
    </div>

    <p style="text-align: right;"><input type="submit" value="送信" class="button" ></p><br>
    <a href = "cancel.html">取引キャンセル申請</a>
    

  </section>

  
<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
