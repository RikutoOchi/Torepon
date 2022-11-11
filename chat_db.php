<?php

    // チャット内容
    $chat_text = $_POST["chat_text"];
    // チャット相手のユーザーID
    $partner_user_id = $_GET['id'];

    // チャットの入力欄が空欄で送信マークが押された時、何もせずに戻る
    if(empty($chat_text) == True){
        header('Location:chat.php?id='.$partner_user_id.'');
    // チャットの入力欄に何かが入力された状態で送信ボタンが押された時、DBに内容を保存
    } else {
        session_start();    // セッションのスタート

        date_default_timezone_set ('Asia/Tokyo');   // 日本時間に設定
        $chat_time = date('Y-m-d H:i:s');   // チャット時間の取得

        $user_id = $_SESSION['user_id'];    // ユーザーID
        $trade_id = 1; //$trade_id = $_SESSION['trade_id'];  // トレードID 
        $pdo = new PDO(
            'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
            'shopping',     // ユーザー名
            'site');        // パスワード 
        $pdo->query('SET NAMES utf8;');
        $stmt = $pdo->prepare('INSERT INTO chats(TRADE_ID,USER_ID,PARTNER_USER_ID,CHAT_TIME,CHAT_TEXT) VALUES(:trade_id,:user_id,:partner_user_id,:chat_time,:chat_text)');
        $stmt->bindValue(':trade_id', $trade_id);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':partner_user_id', $partner_user_id);
        $stmt->bindValue(':chat_time', $chat_time);
        $stmt->bindValue(':chat_text', $chat_text);
        $stmt->execute();
        unset($pdo);
        header('Location:chat.php?id='.$partner_user_id.'');
    }

?>