<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- 呼び出し -->
<?php require_once __DIR__ . './classes/trade.php'; ?>
<!-- /呼び出し-->

<?php
    // 申請時刻（現在時刻）の取得
    date_default_timezone_set ('Asia/Tokyo');
    $application_time = date('Y-m-d H:i:s');

    // tradesテーブルにデータを格納
    $tr = new Trade( );
    $tr->tr_add($_GET['id'],$_SESSION['user_id'],$application_time);

    
/* ----------------------------------------- トレード相手のユーザーID取得 ------------------------------------------------ */

    /*　概要等
        $_GET['id']　　　　　 →　トレードID
        $_SESSION['user_id']　→　自分のユーザーID
        $application_time　　 →　メッセージ送信時刻

        $user_id　　　　　　　→　トレード相手のユーザーID
        $user_name　　　　　　→　トレード相手のユーザー名
    */

    // DBからトレード相手のユーザーIDを取得するための処理
    $data = new Trade_user_info( );
    $user = $data->get_user_info($_GET['id'],$_SESSION['user_id'],$application_time);

    // 連想配列からデータの抽出
    foreach($user as $data){
        $user_id = $data['USER_ID'];
    }
/* ---------------------------------------- /トレード相手のユーザーID取得 ------------------------------------------------ */


/* --------------------------------------------- チャット内容の保存 -------------------------------------------------------- */

    /*　概要等
        $_GET['id']　　　　　 →　トレードID
        $_SESSION['user_id']　→　メッセージ送信者のユーザーID
        $user_id　　　　　　　→　メッセージ受信者のユーザーID
        $application_time　　 →　メッセージ送信時刻
        $_POST['apply_text']　→　メッセージの内容
        0,1　　　　　　　　　 →　フラグ（チャット相手の抽出に必要なもの）
    */

    // 申請時の文章をDBに保存（フラグ0バージョン）
    $text_data = new Trade_chat_text( );
    $user = $text_data->chat_text_add($_GET['id'],$_SESSION['user_id'],$user_id,$application_time,$_POST['apply_text'],0);

    // 申請時の文章をDBに保存（フラグ1バージョン）
    $text_data = new Trade_chat_text( );
    $user = $text_data->chat_text_add($_GET['id'],$user_id,$_SESSION['user_id'],$application_time,$_POST['apply_text'],1);

/* -------------------------------------------- /チャット内容の保存 -------------------------------------------------------- */

    // チャット画面に以降
    header('Location:chat.php?id='.$user_id.'&id2='.$_GET['id'].'');
?>
