<?php
  require_once __DIR__ . './classes/dbdata.php';
  // Dbdataオブジェクトを生成する
  $exh = new Dbdata();
  // ガチャタイトルを取り出す
  $exhibit_gacha = $exh->getRecord('gacha_titles','GACHA_TITLE_ID',$exhibit['GACHA_TITLE_ID']);
?>
<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/check.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->
<main class="main-side-content">
  <section class="main-content">
    </div>

      <label>トレード履歴:</label>
      <a href = "./ticket-confirm.php">詳細</a><br><br><br>
      
      <font size="5">チケット枚数</font>
      <table border="1">
        <tr bgcolor="#87cefa">
          <th>チケット名</th>
          <th>枚数</th>
          <th>利用日時</th>
        </tr>
        <tr>
          <th><?= $exhibit_gacha['GACHA_TITLE_NAME'] ?>用チケット</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr> 
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr> 
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        

      </table>
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
