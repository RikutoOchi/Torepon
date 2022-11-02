<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/tra-info.css" />

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php

    // どの商品の詳細画面に飛ぶかの情報
    $id = $_GET['id'];
    // 自分が出品した物か否か
    $flag = $_GET['flag'];

    if( $flag == 0 ){

        require_once __DIR__ . './classes/dbdata.php';
        $exh = new Dbdata();
        $data = $exh->getRecords('exhibits','EXHIBIT_ID',$id);

        // DBから取り出した各種データの取得
        foreach($data as $detail){
            // ユーザーアイコン
            $user_icon = './images/userIcon.png';
            // 商品画像
            $exhibit_pic_url = $detail['EXHIBIT_PIC_URL'];
            // 取引相手のユーザーIDの取得
            $partner_user_id = '-----';
            // 商品タイトルの取得
            $exhibit_title = "-----";
            // 商品名
            $exhibit_name = $detail['EXHIBIT_NAME'];
            // 商品コンディション
            $exhibit_condition = "-----";
            // 必要チケットの種類
            $ticket_type_id = $detail['TICKET_TYPE_ID'];
            // 必要枚数
            $number_pf_tickets = $detail['NUMBER_OF_TICKETS'];
            // 
            $user_id = "----------";
            // 取引相手のユーザーID
            $user_name = "----------";
            //
            $day = "----------";
        }
        
    } else if ( $flag == 1 ){

        require_once __DIR__ . './classes/transaction-information.php';
        $dat= new Transaction_information_data();
        $data = $dat->getRecord_transaction_information_data('exhibits','trades','users','EXHIBIT_ID','TRADE_ID','USER_ID',$id);
        
        foreach($data as $detail){
            // ユーザーアイコン
            $user_icon = $detail['USER_ICON_URL'];
            // 商品画像
            $exhibit_pic_url = $detail['EXHIBIT_PIC_URL'];
            // 取引相手のユーザーIDの取得
            $partner_user_id = $detail['USER_ID'];
            //
            $user_name = $detail['USER_NAME'];
            // 商品タイトルの取得
            $exhibit_title = "-----";
            // 商品名
            $exhibit_name = $detail['EXHIBIT_NAME'];
            // 商品コンディション
            $exhibit_condition = "-----";
            // 必要チケットの種類
            $ticket_type_id = $detail['TICKET_TYPE_ID'];
            // 必要枚数
            $number_pf_tickets =  $detail['NUMBER_OF_TICKETS'];
            // お届け先
            $address = "-----";
            //
            $day = $detail['TRADE_START_TIME'];
            
        }

    }

?>

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        <div class="tr-info">
            <div class="info-title">
                <h1>トレード情報</h1>
            </div>
            <div class="item-info">
                <div class="item-img">
                    <img src="<?php echo $exhibit_pic_url ?>">
                </div>
                <div class="counter-info">
                    <img class="counter-icon" src="<?php echo $user_icon ?>">
                    <p class="counter-name">取引相手の名前　：　<?php echo $user_name ?></p>
                    <p class="counter-id">取引相手のID　：　<?php echo $partner_user_id ?></p>
                </div>
                <div class="item-deta">
                    <p>商品タイトル　：　<?php echo $exhibit_title ?></p>
                    <p>商品名　：　<?php echo $exhibit_name ?></p>
                    <p>商品コンディション　：　<?php echo $exhibit_condition ?></p>
                    <p>必要チケット種類・枚数　：　<?php echo $ticket_type_id."　".$number_pf_tickets ?></p>
                    <p>取引開始日時　：　<?php echo $day ?></p>

                    <div class="chat-return">
                        <a href="chat.php" class="btn btn--orange btn--radius">チャットにもどる</a>
                    </div>
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