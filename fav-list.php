<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/fav-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<main class="main-side-content">
  <section class="main-content">
  <!-- mainコンテンツ -->
      <h1 class="sub-ttl fav-subttl">お気に入りリスト</h1>
    <div class="item-list"> 
      <div class="responsive">
        <div class="img">
        <a target="_blank" href="./ex-confirm.html">
        <img src=".\images\keyholder_kuma.png" alt="くま">
        </a>
        <div class="desc">動物キーホルダー くま</div>
        </div>
       
      </div>
 
      <div class="responsive">
        <div class="img">
        <a target="_blank" href="./ex-confirm.html">
        <img src="https://www.takaratomy-arts.co.jp/upfiles/products/Y050022_s.jpg" alt="アイテム名">
        </a>
        <div class="desc">アイテム名</div>
        </div>
      </div>
 
      <div class="responsive">
        <div class="img">
        <a target="_blank" href="./ex-confirm.html">
        <img src="https://www.takaratomy-arts.co.jp/upfiles/products/Y051838_s.jpg" alt="アイテム名">
        </a>
        <div class="desc">アイテム名</div>
        </div>
      </div>
 
      <div class="responsive">
        <div class="img">
        <a target="_blank" href="./ex-confirm.html">
        <img src="https://www.takaratomy-arts.co.jp/upfiles/products/Y893759_s.jpg" alt="アイテム名">
        </a>
        <div class="desc">アイテム名</div>
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

