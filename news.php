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
    // DB実行のためのファイルの読み込み
    require_once __DIR__ . './classes/news_class.php';

    // 自分が関係しているトレードのトレードIDをすべて取得
    $dat = new News();
    $data = $dat->news_get_massege($_SESSION['user_id']);
?>

<script>
    // 10秒ごとにリロード
    var timer = "10000"; //指定ミリ秒単位
    function ReloadPage(){
    window.location.reload();
    }
    setTimeout(ReloadPage, timer);
</script>

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <h1 class="ttl-text">お知らせ</h1>

        <div class="news-wrapper">
            <div class="news-inner">
                <ul class="news-list">
                        
                    <?php foreach($data as $detail){ ?>
                        <li class="news-item">
                            <?php echo $detail['USER_NAME'].'からメッセージがあります。' ?>
                            <br>
                            <?php echo $detail['CHAT_TIME'] ?>
                        </li>
                    <?php } ?>
                    
                </ul>
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