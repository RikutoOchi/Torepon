<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/ex-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->


<main class="main-side-content">
    <section class="main-content">  
        <div class="item-list">

            <?php 
                // DB実行のためのファイルの読み込み
                require_once __DIR__ . './classes/chat_selection_class.php';

                // 自分が関係しているトレードのトレードIDをすべて取得
                $chat_detail = new Chat_selection_trade_id();
                $data = $chat_detail->get_trade_select($_SESSION['user_id']);
            ?>

            <?php foreach($data as $data_part){ ?>

                <?php 
                    // 連想配列からトレードIDを取り出す
                    $trade_data = $data_part['TRADE_ID'];

                    // トレードIDを元に、出品情報の取得を行う
                    $chat_detail = new Chat_selection_product_info();
                    $data2 = $chat_detail->get_product_info($trade_data);
                ?>

                <!-- トレード数の数だけ、出力 -->
                <?php foreach($data2 as $data_part2){ ?>

                    <?php
                        // 出品者のID（exhibits.user_id）が自分のIDの場合、$partner_user_idに申請者のユーザーID（trades.user_id）を格納
                        if($data_part2['sell_id']  == $_SESSION['user_id']){
                            $partner_user_id = $data_part2['buy_id'];
                        // 申請者のユーザーID（trades.user_id）が自分のIDの場合、$partner_user_idに出品者のID（exhibits.user_id）を格納
                        } elseif ($data_part2['buy_id']  == $_SESSION['user_id']){
                            $partner_user_id = $data_part2['sell_id'];
                        }
                    ?>

                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="./chat.php?id=<?php echo $partner_user_id ?>&id2=<?php echo $trade_data?>">
                                <img src="<?= $data_part2['EXHIBIT_PIC_URL'] ?>" />
                            </a>
                            <div class="desc">
                                <center>
                                <?php echo $data_part2['EXHIBIT_NAME'] ?>
                                <br>
                                </center>
                            </div>
                        </div>
                    </div>
                <?php } ?>

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