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

        <section class="main-content">

            <!-- mainコンテンツ -->
            <?php
                //検索ワードを受け取る
                $select = $_POST['select'];
                $text = $_POST['text'];

                //　検索文字列と一致 or 検索文字列が含まれる　に加工
                $Searchdata = "%" . $text . "%";

                //検索するSOL文
                if ( $select == 'title' ) {
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                            from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                            where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";     // タイトルで検索された場合のSQL文（対象：ガチャタイトル、出品名）
                } elseif ( $select == 'character' ) {
                    $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID
                            from EXHIBITS
                            where EXHIBIT_NAME LIKE '" . $Searchdata . "'";       // キャラクターで検索された場合のSQL文（対象：出品名）
                } elseif ( $select == 'gensaku' ) {
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                    from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                    LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                    where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";                // 原作で検索された場合のSQL文（対象：原作タイトル名、出品名）
                } elseif ( $select == 'maker' ) {
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                            from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                            LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                            where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";       // メーカーで検索された場合のSQL文（対象：メーカー名、出品名）
                } else {
                    /*　★★★ エラー表示 ★★★　*/
                }

                // DB接続に必要なやつ
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
                    'shopping',     // ユーザー名
                    'site');        // パスワード 

                //検索結果を$data1,data2に格納
                $data1 = $pdo->query($sql);
                $data2 = $pdo->query($sql);

                // 接続終了
                unset($pdo);

                // 検索結果の有無を調べる為のもの
                foreach ($data1 as $row){ 
                    $judge = $row['EXHIBIT_ID'];
                }

            ?>

            <!--検索結果-->
            <div class="SearchResults">

                <h1 class="SearchKeyword"><? $text ?></h1>

                    <!-- 検索結果が1つ以上ある場合 -->
                    <?php if( empty( $judge ) == false){ ?>
                        
                        <?php foreach ($data2 as $row){ ?>
                            <ul class="Results">
                                <a href="ex-confirm.php?data=<?php $row['EXHIBIT_ID'] ?>">
                                    <img src="<?= $row['EXHIBIT_PIC_URL'] ?>">
                                </a>
                            </ul>
                        <?php } ?>

                    <!-- 検索結果が0場合  -->
                    <?php } else { ?>
                        <!-- 検索結果が0の画面や表示を記載 -->
                        <?php echo '検索結果：０件' ?>
                    <?php } ?>

                </class>

            </div>

        </section>
    
    </main>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
 <!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->