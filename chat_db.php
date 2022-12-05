<?php

    require_once __DIR__ . './classes/chat_db_class.php';

    // チャットの入力欄が空欄で送信マークが押された時、何もせずに戻る
    if(empty($_POST["chat_text"]) == True){
        header('Location:chat.php?id='.$_GET['id'].'');
    // チャットの入力欄に何かが入力された状態で送信ボタンが押された時、DBに内容を保存
    } else {
        session_start();    // セッションのスタート

        // チャット時刻の取得
        date_default_timezone_set ('Asia/Tokyo');
        $chat_time = date('Y-m-d H:i:s');

        // トレードIDの取得
        $trade_id = new Chat_db_trade_id();
        $data = $trade_id->get_trade_id($_SESSION['user_id'],$_GET['id']);

        foreach($data as $info){
            $trade_id = $info['TRADE_ID'];
        }

        // チャット内容をDBに
        $insert = new Chat_db_insert();
        $data_insert = $insert->insert($trade_id,$_SESSION['user_id'],$_GET['id'],$chat_time,$_POST["chat_text"]);

    }

    header('Location:chat.php?id='.$_GET['id'].'');

?>