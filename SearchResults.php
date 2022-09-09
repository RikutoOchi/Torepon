<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<!-- <link rel="stylesheet" href=""> -->
<link rel="stylesheet" href="./css/ex-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">

        <section class="main-content">

            <!-- mainコンテンツ -->
            <?php

                require_once __DIR__ . './classes/dbdata.php';

                $sort_id = $_GET['sort_id'];
                $select = $_SESSION['select'];
                $text = $_SESSION['text'];

                $exh = new Dbdata();

                //　検索文字列と一致 or 検索文字列が含まれる　に加工
                $Searchdata = "%" . $text . "%";

                // タイトルで検索された場合
                if ( $select == 'title' ) {

                    if($sort_id == 0){
                        // SQL文（抽出対象：ガチャタイトル、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                        from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                        where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME";
                    } elseif($sort_id == 1){
                        // SQL文（抽出対象：ガチャタイトル、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                        from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                        where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 2){
                        // SQL文（抽出対象：ガチャタイトル、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                        from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                        where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 3){
                        // SQL文（抽出対象：ガチャタイトル、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                        from EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID 
                        where GACHA_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    }

                    $data = $exh->getRecord_0($sql);
                
                // キャラクターで検索された場合
                } elseif ( $select == 'character' ) {

                    if($sort_id == 0){
                        // SQL文（抽出対象：出品名）
                        $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID,EXHIBIT_NAME 
                                from EXHIBITS
                                where EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME";
                    } elseif($sort_id == 1){
                        // SQL文（抽出対象：出品名）
                        $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID,EXHIBIT_NAME 
                                from EXHIBITS
                                where EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 2){
                        // SQL文（抽出対象：出品名）
                        $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID,EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from EXHIBITS
                                where EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 3){
                        // SQL文（抽出対象：出品名）
                        $sql = "select EXHIBIT_PIC_URL,EXHIBIT_ID,EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from EXHIBITS
                                where EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    }

                    $data = $exh->getRecord_0($sql);

                // 原作で検索された場合
                } elseif ( $select == 'gensaku' ) {

                    if($sort_id == 0){
                        // SQL文（抽出対象：原作タイトル名、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                                where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME";
                    } elseif($sort_id == 1){
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                                where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 2){
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                                where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 3){
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
                                where ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    }

                    $data = $exh->getRecord_0($sql);

                    // メーカーで検索された場合
                } elseif ( $select == 'maker' ) {

                    if($sort_id == 0){
                        // SQL文（抽出対象：メーカー名、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                                where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME";
                    } elseif($sort_id == 1){
                        // SQL文（抽出対象：メーカー名、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                                where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 2){
                        // SQL文（抽出対象：メーカー名、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                                where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    } elseif($sort_id == 3){
                        // SQL文（抽出対象：メーカー名、出品名）
                        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,EXHIBITS.NUMBER_OF_TICKETS 
                                from ((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
                                LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
                                where MAKERS.MAKER_NAME LIKE '" . $Searchdata . "' or EXHIBITS.EXHIBIT_NAME LIKE '" . $Searchdata . "' ORDER BY EXHIBIT_TIME DESC";
                    }
                    
                    $data = $exh->getRecord_0($sql);

                } else {
                    /*　★★★ エラー表示 ★★★　*/
                }
            ?>

            <div class="SearchResults">

                    <font size="4">絞り込み条件</font><br>
                    <font size="2">
                        <?php if($sort_id == 0){ ?>
                            　キャラクター名：<input type="text" name="kyara"><br>
                        <?php }elseif($sort_id == 1) {?>
                            　ガチャタイトル：<input type="text" name="kyara"><br>
                        <?php } ?>
                        　出　品　日　時：<input type="date" name="kyara">～<input type="date" name="kyara"><br>
                        　チケット種類　：<input type="text" name="kyara"><br>
                        　チケット枚数　：<input type="text" name="kyara">～<input type="text" name="kyara">　<input type="button" value="絞り込む" class="search" onclick="location.href='SearchResults.php?sort_id=1'"/><br><br>
                    </font>
                    <!--
                        <br><br><input type="button" value="詳細な条件から絞り込む" class="search" onclick="location.href='SearchResults.php?sort_id=1'"/>
                    -->

                    <h2 style=display:inline;>検索結果</h2>
                    <br><label>　ソート順：</label>
                    <?php if($sort_id == 0){ ?>
                        <input type="button" value="新しい順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='SearchResults.php?sort_id=0'"/>
                        <input type="button" value="古い順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=1'"/>
                        <label>　　</label>
                        <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=2'"/>
                        <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=3'"/>
                    <?php } elseif($sort_id == 1){ ?>
                        <input type="button" value="新しい順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=0'"/>
                        <input type="button" value="古い順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='SearchResults.php?sort_id=1'"/>
                        <label>　　</label>
                        <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=2'"/>
                        <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=3'"/>
                    <?php } elseif($sort_id == 2){ ?>
                        <input type="button" value="新しい順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=0'"/>
                        <input type="button" value="古い順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=1'"/>
                        <label>　　</label>
                        <input type="button" value="チケット数　昇順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='SearchResults.php?sort_id=2'"/>
                        <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=3'"/>
                    <?php } elseif($sort_id == 3){ ?>
                        <input type="button" value="新しい順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=0'"/>
                        <input type="button" value="古い順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=1'"/>
                        <label>　　</label>
                        <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='SearchResults.php?sort_id=2'"/>
                        <input type="button" value="チケット数　降順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='SearchResults.php?sort_id=3'"/>
                    <?php } ?>
                        <br><br>

                    <!-- 検索結果が1つ以上ある場合 -->
                    <?php if( empty( $data ) == false){ ?>
                        <div class="item-list"> 
                            <?php foreach ($data as $data_part){ ?>
                                <div class="responsive">
                                    <div class="img">
                                        <a target="_blank" href="./ex-confirm.php?ident=<?php echo $dat['EXHIBIT_ID'] ?>">
                                            <img src="<?= $data_part['EXHIBIT_PIC_URL'] ?>" />
                                        </a>
                                        <div class="desc">
                                            <center>
                                                <?php echo $data_part['EXHIBIT_NAME'] ?>
                                                <br>

                                                <!-- 交換に必要なチケット数（チケット数）でソートした場合のみ発動 -->
                                                <?php 
                                                    if($sort_id == 2 || $sort_id == 3) {
                                                    echo '必要チケット数：'.$data_part['NUMBER_OF_TICKETS'];
                                                    }
                                                ?>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <?php echo '検索結果：０件' ?>
                    <?php } ?>
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