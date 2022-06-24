<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/news.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <h1 class="ttl-text">お知らせ</h1>
        <div class="news-wrapper">
            <div class="news-inner">
                <ul class="news-list">
                    <li class="news-item">
                        <a href="./">サンプルサンプルサンプルサンプル</a>
                        <span class="date">2022/06/15</span>
                    </li>
                    <li class="news-item"><a href="./">サンプルサンプルサンプルサンプル</a><span class="date">2022/06/15</span></li>
                    <li class="news-item"><a href="./">サンプルサンプルサンプルサンプル</a><span class="date">2022/06/15</span></li>
                    <li class="news-item"><a href="./">サンプルサンプルサンプルサンプル</a><span class="date">2022/06/15</span></li>
                    <li class="news-item"><a href="./">サンプルサンプルサンプルサンプル</a><span class="date">2022/06/15</span></li>
                   
                </ul>
            </div>
        </div>
      </section>
      </main>
      <!-- /mainコンテンツ -->

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->