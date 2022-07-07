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

                require_once __DIR__ . './classes/dbdata.php';

                //検索ワードを受け取る
                $select = $_POST['select'];
                $text = $_POST['text'];

                $exh = new Dbdata();

                //　検索文字列と一致 or 検索文字列が含まれる　に加工
                $Searchdata = "%" . $text . "%";

                // タイトルで検索された場合
                if ( $select == 'title' ) {

                    // SQL文（抽出対象：ガチャタイトル、出品名）
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                            from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                            where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";

                    $data = $exh->getRecord_0($sql);
                
                // キャラクターで検索された場合
                } elseif ( $select == 'character' ) {

                    // SQL文（抽出対象：出品名）
                    $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID
                            from EXHIBITS
                            where EXHIBIT_NAME LIKE '" . $Searchdata . "'";

                    $data = $exh->getRecord_0($sql);

                // 原作で検索された場合
                } elseif ( $select == 'gensaku' ) {

                    // SQL文（抽出対象：原作タイトル名、出品名）
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                            from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                            LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                            where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";
                    
                    $data = $exh->getRecord_0($sql);

                    // メーカーで検索された場合
                } elseif ( $select == 'maker' ) {

                    // SQL文（抽出対象：メーカー名、出品名）
                    $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID 
                            from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                            LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                            where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "'";
                    
                    $data = $exh->getRecord_0($sql);

                } else {
                    /*　★★★ エラー表示 ★★★　*/
                }
            ?>

            <!-- 検索結果 -->
            <div class="SearchResults">

                <h1 class="SearchKeyword"><? $text ?></h1>

                    <!-- 検索結果が1つ以上ある場合 -->
                    <?php if( empty( $data ) == false){ ?>
                        <ul class="Results">
                            <a href="ex-confirm.php?data=<?php $data['EXHIBIT_ID'] ?>">
                                <img src="<?= $data['EXHIBIT_PIC_URL'] ?>">
                            </a>
                        </ul>
                    <?php } else { ?>
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