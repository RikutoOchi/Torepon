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

  // チケットの入手履歴の情報取得
  $g_dat = new Check_get_chicket_data();
  $get_data = $g_dat->getRecord_check_get_chicket_data($_SESSION['user_id']);

  // チケットの使用履歴の情報取得
  $l_dat = new Check_lost_chicket_data();
  $lost_data = $l_dat->getRecord_check_lost_chicket_data($_SESSION['user_id']);

?>

  <main class="main-side-content">
      <section class="main-content">
    </dl>

    
      <label>チケット残数:</label>
      <a href = "./ticket-confirm.php">詳細</a><br><br><br>
      
      <font size="5">チケット入手履歴</font>
      <table border="1">

        <tr bgcolor="#87cefa">
          <th>チケット名</th>
          <th>枚数</th>
          <th>利用日時</th>
        </tr>

        <?php foreach($get_data as $get_data_detail) { ?>
          <tr>
            <th><?php echo $get_data_detail['GACHA_TITLE_NAME'] ?></th>
            <th><?php echo $get_data_detail['NUMBER_OF_TICKETS'] ?></th>
            <th><?php echo $get_data_detail['TRADE_FINISH_TIME'] ?></th>
          </tr> 
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
