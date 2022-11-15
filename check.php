<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/check.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php

  require_once __DIR__ . './classes/check.php';

  // 自分が保持しているチケットの種類の一覧（チケットタイプID）を取得
  $chicket_type = new Check_keep_chicket_type_data();
  $chicket_type_data = $chicket_type->getRecord_check_keep_chicket_type_data($_SESSION['user_id']);

?>

<main class="main-side-content">
      <section class="main-content">
    </dl>

    
      <label>チケット履歴:</label>
      <a href = "./ticket-confirm.php">詳細</a><br><br><br>
      
      <font size="5">チケット残数</font>
      <table border="1">
        <tr bgcolor="#87cefa">
          <th>チケット名</th>
          <th>枚数</th>
        </tr>

      <?php foreach($chicket_type_data as $chicket_type_data_detail) { ?>

        <?php
          require_once __DIR__ . './classes/check.php';
          // 自分が保持しているチケットの名前とその枚数を取り出す
          $chicket = new Check_keep_chicket_data();
          $chicket_data = $chicket->getRecord_check_keep_chicket_data($_SESSION['user_id'],$chicket_type_data_detail['GACHA_TITLE_ID']);
        ?>

        <?php foreach($chicket_data as $chicket_data_detail){ ?>

          <tr>
            <th><?php echo $chicket_data_detail['GACHA_TITLE_NAME'] ?></th>
            <th><?php echo $chicket_data_detail['NUMBER_OF_TICKETS'] ?></th>
          </tr>

        <?php } ?>

      <?php } ?>
      
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
