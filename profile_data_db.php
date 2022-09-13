<?php
    //データを受け取る
    $user_name = $_POST['user_name'];
    $address = $_POST['address'];
    $appeal = $_POST['appeal'];


    echo $user_name;

    /*
    $sql = "update USERS 
            set USER_NAME = '" . $user_name . "', 
            set MAIL_ADDRESS = '" . $address . "',
            set USER_TEXT = '" . $user_name . "'
            where USER_ID = '" . $hogehoge . "'";   // ★★useridを入れる

    // DB接続に必要なやつ
    $pdo = new PDO(
        'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
        'shopping',     // ユーザー名
        'site');        // パスワード 

    //検索結果を$data1,data2に格納
    $data = $pdo->query($sql);

    // 接続終了
    unset($pdo);
    */

?>