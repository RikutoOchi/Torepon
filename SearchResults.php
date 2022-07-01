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
            <!--検索結果-->
                <div class="SearchResults">
                <h1 class="SearchKeyword">検索したキーワード</h1>
                <ul class="Results">
                    <li class="ResultItem"><img src="./images/keyholder1.png">
                        <a class="Username" hreF="./">ユーザ名</a>
                        <a class="Title" href="./">商品タイトル</a>
                    </li>
                    <li class="ResultItem"><img src="./images/keyholder2.png">
                        <a class="Username" hreF="./">ユーザ名</a>
                        <a class="Title" href="./">商品タイトル</a>
                    </li>
                    <li class="ResultItem"><img src="./images/keyholder3.png">
                        <a class="Username" hreF="./">ユーザ名</a>
                        <a class="Title" href="./">商品タイトル</a>
                    </li>
                    <li class="ResultItem"><img src="./images/Hobby1.png">
                        <a class="Username" hreF="./">ユーザ名</a>
                        <a class="Title" href="./">商品タイトル</a>
                    </li>
        </section>
    

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
 <!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->