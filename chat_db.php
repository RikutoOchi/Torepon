<?php

    // 各種DB実行のためのファイルの読み込み
    require_once __DIR__ . './classes/chat_db_class.php';
    require_once __DIR__ . './classes/trade.php';

    // チャットの入力欄が空欄で送信マークが押された時、何もせずに戻る
    if(empty($_POST["chat_text"]) == True){

        // チャット相手のユーザーID（$_GET_['id']）トレードID（$_GET['id2']）を添付して、chat.phpへ
        header('Location:chat.php?id='.$_GET['id'].'&id2='.$_GET['id2'].'');

    // チャットの入力欄に何かが入力された状態で送信ボタンが押された時、DBに内容を保存
    } else {

        // セッションスタート
        session_start();
        
        // 時刻取得のための設定（タイムゾーンを日本/東京に設定）
        date_default_timezone_set ('Asia/Tokyo');
        // チャット時刻の取得 & $chat_timeに取得した時刻を格納
        $chat_time = date('Y-m-d H:i:s');

        // チャット内容をDBに格納する
        $insert = new Chat_db_insert();
        $data_insert = $insert->insert($_GET['id2'],$_SESSION['user_id'],$_GET['id'],$chat_time,$_POST["chat_text"]);

    /* --------------------------------------------- 通知機能 ------------------------------------------------------------------ */

        /*　概要等
            $user_id　　　　　　　→　メッセージ受信者のユーザーID
            $_SESSION['user_id']　→　メッセージ送信者のユーザーID
            $content　　　　　　　→　メッセージの内容（〇〇さんからメッセージが届きました。）
        */

        
        $notification = new Trade_notification();
        $notification_data =  $notification->notification_add($_GET['id'],$_SESSION['user_id'],$content,$chat_time);

        // メッセージ内容の作成
        $content = $user_name.'からメッセージが届きました。';

        // 各種情報をDBに格納
        $notification = new Trade_notification();
        $notification_data =  $notification->notification_add($_GET['id'],$_SESSION['user_id'],$content,$chat_time);

    /* -------------------------------------------- /通知機能 ------------------------------------------------------------------ */   

    }

    // チャット相手のユーザーID（$_GET_['id']）トレードID（$_GET['id2']）を添付して、chat.phpへ
    header('Location:chat.php?id='.$_GET['id'].'&id2='.$_GET['id2'].'');

?>