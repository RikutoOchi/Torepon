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
  $chicket_history = new Check_chicket_data();
  $chicket_history_data = $chicket_history->getRecord_check_chicket_data($_SESSION['user_id']);

?>

  <main class="main-side-content">
      <section class="main-content">
    </dl>

    
      <label>チケット残数:</label>
      <a href = "./ticket-confirm.php">詳細</a><br><br><br>
      
      <font size="5">チケット履歴</font>
      <table border="1">

        <tr bgcolor="#87cefa">
          <th>チケット名</th>
          <th>枚数</th>
          <th>利用日時</th>
        </tr>

        <?php foreach( $chicket_history_data as $chicket_history_data_detail) { ?>
          <tr>
          <!-- 青文字で表示 -->
          <?php if($chicket_history_data_detail['USER_ID'] == $_SESSION['user_id']){ ?>
            <th><label style="color:blue"><?php echo $chicket_history_data_detail['GACHA_TITLE_NAME'] ?></label></th>
            <th><label style="color:blue"><?php echo $chicket_history_data_detail['NUMBER_OF_TICKETS'] ?></label></th>
            <th><label style="color:blue"><?php echo $chicket_history_data_detail['TRADE_FINISH_TIME'] ?></label></th>
          <!-- 赤文字で表示 -->
          <?php } else { ?>
            <th><label style="color:red"><?php echo $chicket_history_data_detail['GACHA_TITLE_NAME'] ?></label></th>
            <th><label style="color:red"><?php echo "-".$chicket_history_data_detail['NUMBER_OF_TICKETS'] ?></label></th>
            <th><label style="color:red"><?php echo $chicket_history_data_detail['TRADE_FINISH_TIME'] ?></label></th>
          <?php } ?>

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
