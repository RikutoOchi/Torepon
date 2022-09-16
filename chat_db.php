<?php

    $chat_text = $_POST["chat_text"];   // チャットメッセージ
    $partner_user_id = $_GET['id'];     // 相手先
    $flag_no = 0;
    $flag_yes = 1;

    if(empty($chat_text) == True){
        header('Location:chat.php?id='.$partner_user_id.'');
    } else {
        session_start();
        date_default_timezone_set ('Asia/Tokyo');   // 日本時間
        $chat_time = date('Y-m-d H:i:s');   // チャット時間の取得

        $user_id = $_SESSION['user_id'];    // ユーザーID
        $trade_id = 1; //$trade_id = $_SESSION['trade_id'];  // トレードID 


        // データ格納（flag無し）
        $pdo = new PDO(
            'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
            'shopping',     // ユーザー名
            'site');        // パスワード 
        $pdo->query('SET NAMES utf8;');
        $stmt = $pdo->prepare('INSERT INTO chats(TRADE_ID,USER_ID,PARTNER_USER_ID,CHAT_TIME,CHAT_TEXT,FLAG) VALUES(:trade_id,:user_id,:partner_user_id,:chat_time,:chat_text,:flag)');
        $stmt->bindValue(':trade_id', $trade_id);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':partner_user_id', $partner_user_id);
        $stmt->bindValue(':chat_time', $chat_time);
        $stmt->bindValue(':chat_text', $chat_text);
        $stmt->bindValue(':flag', $flag_no);
        $stmt->execute();
        unset($pdo);

        // データ格納（flagあり）
        $pdo = new PDO(
            'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
            'shopping',     // ユーザー名
            'site');        // パスワード 
        $pdo->query('SET NAMES utf8;');
        $stmt = $pdo->prepare('INSERT INTO chats(TRADE_ID,USER_ID,PARTNER_USER_ID,CHAT_TIME,CHAT_TEXT,FLAG) VALUES(:trade_id,:user_id,:partner_user_id,:chat_time,:chat_text,:flag)');
        $stmt->bindValue(':trade_id', $trade_id);
        $stmt->bindValue(':user_id', $partner_user_id);
        $stmt->bindValue(':partner_user_id', $user_id);
        $stmt->bindValue(':chat_time', $chat_time);
        $stmt->bindValue(':chat_text', $chat_text);
        $stmt->bindValue(':flag', $flag_yes);
        $stmt->execute();
        unset($pdo);
        
        header('Location:chat.php?id='.$partner_user_id.'');
    }

?>