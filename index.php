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
                    <li class="GenreTag1"><a hreF="./">ジャンル1</a></li>
                    <li class="GenreTag2"><a hreF="./">ジャンル2</a></li>
                    <li class="GenreTag3"><a hreF="./">ジャンル3</a></li>
                    <li class="GenreTag4"><a hreF="./">ジャンル4</a></li>
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
                <iframe src="./Carousel_tests/carousel_test.html"></iframe>
            </div>
            <!-- 商品リスト -->

            <h1 class="sub-ttl">新着アイテム</h1>
            <ul class="goods-list">
               <a href="./ex-confirm.php"><li class="goods-item">グッズ１</li></a> 
               <a href="./ex-confirm.php"><li class="goods-item">グッズ２</li></a> 
               <a href="./ex-confirm.php"><li class="goods-item">グッズ３</li></a>
               <a href="./ex-confirm.php"><li class="goods-item">グッズ４</li></a> 
               <a href="./ex-confirm.php"><li class="goods-item">グッズ５</li></a>
               <a href="./ex-confirm.php"><li class="goods-item">グッズ6</li></a>
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
