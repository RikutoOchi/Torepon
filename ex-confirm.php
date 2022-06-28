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
            <img class="ex-mainimage" src="./images/keyholder_kuma.png" alt="出品画像1" >
            <ul class="ex-subimagelist">
              <li><img src="./images/keyholder_kuma.png" alt="出品画像2" ></li>
              <li><img src="./images/keyholder_kuma.png" alt="出品画像3" ></li>
            </ul>
          </div>
          <div class="ex-texts">
            <h1>出品名</h1>
            <h1>動物キーホルダー くま</h1>
            <hr>
            <p>出品者</p>
            <div class="icon-wrapper" style="float:left ;">
              <a href="./profile.html"><i class="fa-solid fa-circle-user fa-2x"></i></i></a>
            </div>
            <p>きんたろう</p>
            <br>
            <p>出品日時</p>
            <p>2022/ 6/13~2022/7/13</p>
            <hr>
            <p>ガシャポンタイトル</p>
            <p>動物キーホルダーvol.1</p>
            <hr>
            <p>タグ</p>
            <ul class="ex-taglist">
              <li>#キーホルダー</li>
              <li>#くま</li>
              <li>#開封済み</li>
            </ul>
            <hr>
            <p> 必要チケット</p>
            <p>動物キーホルダーvol.1チケット</p>
            <br>
            <p>必要枚数</p>
            <p>1 枚</p>
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
