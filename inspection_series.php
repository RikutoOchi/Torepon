<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/inspection_exhibit.css" />

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
    <section class="main-content">
        <!-- mainコンテンツ -->
        <div class="maincol">
            <div class="maincol-container">
              <div class="news">
                <ul class="news-contents">
                  <li><img src="images/series2.jpg" height="100" alt=""><a href="inspection_exhibit1.html">
                    <p>クマのキーホルダー　vol.1</p></a>
                  </li>

                  <li><img src="images/series1.jpg" height="100" alt=""><a href="inspection_exhibit1.html">
                    <p>森の動物シリーズ vol.1</p></a>
                  </li>
  
                  <li><img src="images/series3.jpg" height="100" alt=""><a href="inspection_exhibit1.html">
                    <p>アイドル　キーホルダーコレクション　vol.3</p></a>
                  </li>
  
                  <li><img src="images/series4.jpg" height="100" alt=""><a href="inspection_exhibit1.html">
                    <p>〇△レンジャー</p></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <!-- /mainコンテンツ -->
      </section>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
