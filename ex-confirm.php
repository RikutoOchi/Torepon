<?php
  // 送られてきた商品番号を受け取る（エスケープ処理は不要）
  $exhibit_id = 1; //$_GET['ident'];
  // Productオブジェクトを生成する
  require_once __DIR__ . './classes/product.php';
  $product = new Product();
  // Userオブジェクトを生成する
  require_once __DIR__ . './classes/user.php';
  $user = new User();
  // 選択された商品を取り出す
  $exhibit = $product->getExhibit($exhibit_id);
  // 出品者情報を取り出す
  $exhibit_user = $user->getUser($exhibit['USER_ID']);
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
            <img class="ex-mainimage" src="./images/<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像1" >
            <ul class="ex-subimagelist">
              <li><img src="./images/<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像2" ></li>
              <li><img src="./images/<?= $exhibit['EXHIBIT_PIC_URL'] ?>" alt="出品画像3" ></li>
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
            <p><?= $exhibit['USER_ID'] ?><?= $exhibit_user['USER_NAME'] ?></p>
            <br>
            <p>出品日時</p>
            <p><?= $exhibit['EXHIBIT_TIME'] ?></p>
            <hr>
            <p>ガシャポンタイトル</p>
            <p><?= $exhibit['GACHA_TITLE_ID'] ?></p>
            <hr>
            <p>タグ</p>
            <p><?= $exhibit['TAG_TEXT'] ?></p>
            <!-- <ul class="ex-taglist"> -->
            <!-- </ul> -->
            <hr>
            <p> 必要チケット</p>
            <p><?= $exhibit['TICKET_TYPE_ID'] ?></p>
            <br>
            <p>必要枚数</p>
            <p><?= $exhibit['NUMBER_OF_TICKETS'] ?>枚</p>
            <hr>
            動物キーホルダーvol.1のクマのキーホルダーです。<br>
            開封済みですが未使用で保存しているので状態は良いと思います。<br>
            <hr>
            <h2>取引申請</h2>
            <textarea class="dealingrequest-textarea" type="text"></textarea>
            <button class="dealingrequest-button">取引申請する</button>
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
