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
                    <li class="GenreTag1"><a hreF="./">ワンピース</a></li>
                    <li class="GenreTag2"><a hreF="./">ドラえもん</a></li>
                    <li class="GenreTag3"><a hreF="./">鬼滅の刃</a></li>
                    <li class="GenreTag4"><a hreF="./">動物 </a></li>
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
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/keyholder1.png" alt=""></li></a> 
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/keyholder2.png" alt=""></li></a> 
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/keyholder3.png" alt=""></li></a>
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/kuma1.jpg" alt=""></li></a> 
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/kuma2.jpg" alt=""></li></a>
               <a href="./ex-confirm.php"><li class="goods-item"><img src="./Carousel_tests/Test_images/kuma3.jpg" alt=""></li></a>
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
