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
    $flag = $_GET['flag'];

    if( $flag == 0 ){

        require_once __DIR__ . './classes/dbdata.php';
        $exh = new Dbdata();
        $sql = "select * from EXHIBITS where EXHIBIT_ID = '" . $id . "'";
        $data = $exh->getRecord_0($sql);

        foreach($data as $detail){

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
            // お届け先
            $address = "-----";
            // 取引相手のユーザーID
            $user_name = '-----';
        }
        
    } else if ( $flag == 1 ){

        require_once __DIR__ . './classes/dbdata.php';
        $exh = new Dbdata();
        $sql = "select * from EXHIBITS LEFT OUTER JOIN TRADES ON EXHIBITS.EXHIBIT_ID = TRADES.EXHIBIT_ID
                where EXHIBITS.EXHIBIT_ID = '" . $id . "'";
        $data = $exh->getRecord_0($sql);
        
        foreach($data as $detail){
            // 取引相手のユーザーIDの取得
            if( $detail['OTHER_PARTY_ID'] == $_SESSION['user_id']){
                $partner_user_id = $detail['USER_ID'];
            } else if( $detail['USER_ID'] == $_SESSION['user_id']) {
                $partner_user_id = $detail['OTHER_PARTY_ID'];
            }
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
            
        }

        // 取引相手のユーザーIDから取引相手の情報を取得
        require_once __DIR__ . './classes/dbdata.php';
        $exh = new Dbdata();
        
        $sql2 = "select * from USERS where USER_ID = '" . $partner_user_id . "'";
        $data2 = $exh->getRecord_0($sql2);

        foreach($data2 as $detail2){
            $user_name = $detail2['USER_NAME'];
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
                    <img src="images/kuma1.jpg">
                </div>
                <div class="counter-info">
                    <img class="counter-icon" src="images/userIcon.png">
                    <p class="counter-name">取引相手の名前　：　<?php echo $user_name ?></p>
                    <p class="counter-id">取引相手のID　：　<?php echo $partner_user_id ?></p>
                </div>
                <div class="item-deta">
                    <p>商品タイトル　：　<?php echo "" ?></p>
                    <p>商品名　：　<?php echo $exhibit_name ?></p>
                    <p>商品コンディション　：　<?php echo $exhibit_condition ?></p>
                    <p>必要チケット種類　：　<?php echo $ticket_type_id ?>
                    <p>枚数　：　<?php echo $number_pf_tickets ?></p>
                </div>
                <div class="delivery-address">
                    <p>お届け先　：　<?php echo $address ?></p>
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