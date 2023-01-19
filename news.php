<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/news.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php
    
?>

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <h1 class="ttl-text">お知らせ</h1>

        <div id="ajaxreload3">

            <div class="news-wrapper">
                <div class="news-inner">
                    <ul class="news-list">
                        
                        <?php foreach(){ ?>
                            <li class="news-item">
                            
                            </li>
                        <?php } ?>
                    
                    </ul>
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