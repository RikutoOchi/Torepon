<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<!-- <link rel="stylesheet" href=""> -->

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<main class="main-side-content">
  <!-- mainコンテンツ -->
  <section class="main-content">
    <!--人気タグ-->
    <div class="PopularTags">
      <h1 class="sub-ttl">人気</h1>
      <ul class="Tags">
        <li class="GenreTag1"><a hreF="./">キーホルダー</a></li>
        <li class="GenreTag2"><a hreF="./">マスコット</a></li>
        <li class="GenreTag3"><a hreF="./">どうぶつ</a></li>
        <li class="GenreTag4"><a hreF="./">フィギュア</a></li>
      </ul>
    </div>
    <!--おすすめアイテム カルーセルバナー-->
    <div class="RecommendedItems">
      <h1 class="sub-ttl">おすすめアイテム</h1>
      <iframe src="./Carousel_tests/carousel_test.html"></iframe>
    </div>

    <!--気になったアイテム　カルーセルバナー-->
    <div class="FavoriteItems">
      <h1>気になったアイテム</h1>
      <iframe src="./Carousel_tests/carousel_test2.html"></iframe>
    </div>
    <!-- 商品リスト -->
    <!-- 追記 -->
    <?php
    require_once __DIR__ . './classes/dbdata.php';
    $exh = new Dbdata();
    $sql = "select EXHIBIT_ID,EXHIBIT_NAME,EXHIBIT_PIC_URL from EXHIBITS ORDER BY
  EXHIBIT_TIME LIMIT 6";
    $data = $exh->getRecord_0($sql);
    ?>
    <!---------->

    <h1 class="sub-ttl">新着アイテム</h1>
    <ul class="goods-list">
      <?php foreach ($data as $data_part) { ?>
      <a href="./ex-confirm.php?id=<?php echo $data_part['EXHIBIT_ID'] ?>">
        <li class="goods-item">
          <?php $data_part['EXHIBIT_NAME'] ?>
          <img src="<?= $data_part['EXHIBIT_PIC_URL'] ?>" />
        </li>
      </a>
      <?php } ?>
    </ul>
  </section>

  <!-- サイドコンテンツ -->
  <?php require_once('./temp/side.php'); ?>
  <!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->