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

        <?
            //検索ワードを受け取る
            $select = $_POST['select'];
            $text = $_POST['text'];
            //検索するSOL文
            $Searchdata = "%" . $text . "%";

            // Searchクラスを利用する
            require_once __DIR__ . '/../classes/Search.php';
            $product = new Search( );

            // 選択されたジャンルのデータを抽出
            $datas = $product->getItems( $Searchdata, $select );
        ?>

        <?
            foreach ($data as $datas){ 
                $judge = $data['EXHIBIT_ID'];
        ?>

        <section class="main-content">

            <!--検索結果-->

            <div class="SearchResults">
                <h1 class="SearchKeyword"><? $text ?></h1>

                    <!-- 検索結果が0の場合 -->
                    <? if($judge != ""){ ?>
                        <!--   ★検索結果が０の場合の表示画面★   --> 

                    <!-- 検索結果が1つ以上ある場合  -->
                    <? } else { ?>
                        <? foreach ($data as $datas){ ?>
                                <ul class="Results">
                                    <li class="ResultItem"><img src="<? $row['EXHIBIT_PIC_URL'] ?>">
                                        <a hreF="./ex-confirm.php?data=<? $row['EXHIBIT_ID'] ?>"></a>
                                    </li>
                                </ul>
                            <? } ?>
                    <? } ?>
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