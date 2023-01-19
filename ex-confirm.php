<?php
  // 送られてきた商品番号を受け取る（エスケープ処理は不要）
  $exhibit_id = $_GET['id'];

  // Dbdataオブジェクトを生成する
  require_once __DIR__ . './classes/dbdata.php';
  $exh = new Dbdata();
  // 選択された商品を取り出す
  $exhibit = $exh->getRecord('exhibits','EXHIBIT_ID',$exhibit_id);

  // Dbdataオブジェクトを生成する
  $usr = new Dbdata();
  // 出品者情報を取り出す
  $exhibit_user = $usr->getRecord('users','USER_ID',$exhibit['USER_ID']);

  // Dbdataオブジェクトを生成する
  $gch = new Dbdata();
  // ガチャタイトルを取り出す
  $exhibit_gacha = $gch->getRecord('gacha_titles','GACHA_TITLE_ID',$exhibit['GACHA_TITLE_ID']);
?>
<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/ex-confirm.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <div class="ex-description">
          <div class="ex-images">
            <img class="ex-mainimage" src="<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像1" >
            <ul class="ex-subimagelist">
              <li><img src="<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像2" ></li>
              <li><img src="<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像3" ></li>
            </ul>
          </div>
          <div class="ex-texts">
            <h1>出品名</h1>
            <h1><?= $exhibit['EXHIBIT_NAME'] ?></h1>
            <hr>
            <p>出品者</p>
            <div class="icon-wrapper" style="float:left ;">
              <a href="./profile.html"><i class="fa-solid fa-circle-user fa-2x"></i></i></a>
            </div>
            <p><?= $exhibit_user['USER_NAME'] ?></p>
            <br>
            <p>出品日時</p>
            <p><?= $exhibit['EXHIBIT_TIME'] ?></p>
            <hr>
            <p>ガシャポンタイトル</p>
            <p><?= $exhibit_gacha['GACHA_TITLE_NAME'] ?></p>
            <hr>
            <p>タグ</p>
            <p><?= $exhibit['TAG_TEXT'] ?></p>
            <!-- <ul class="ex-taglist"> -->
            <!-- </ul> -->
            <hr>
            <p> 必要チケット</p>
            <p><?= $exhibit_gacha['GACHA_TITLE_NAME'] ?>用チケット</p>
            <br>
            <p>必要枚数</p>
            <p><?= $exhibit['NUMBER_OF_TICKETS'] ?>枚</p>
            <hr>
            <?= $exhibit['EXHIBIT_TEXT'] ?>
            <hr>

            <?php 
              require_once __DIR__ . './classes/dbdata.php';
              $trade = new DbData( );
              // trade_id = exhibit_id とする（trade_idはexhibit_idで作成するようにする）
              $data = $trade->getRecord('trades','TRADE_ID',$exhibit_id);
            ?>
              
            <?php if(empty($data)){ ?>
              <h2>トレード申請</h2>
              <form action="./tr_add.php?id=<?php echo $exhibit['EXHIBIT_ID'] ?>" method="post" enctype="multipart/form-data" >
              <textarea name="apply_text" class="dealingrequest-textarea" ></textarea>
              <button class="dealingrequest-button" type="submit">トレード申請する</button>
            <?php } else { ?>
              <button class="dealingrequest-button" onclick="location.href='./chat.php?id=<?php echo $exhibit['USER_ID'] ?>'">チャットへ移動</button>
            <?php } ?>

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