<?php

    session_start();

    $address = $_POST["address"];
    $user_name = $_POST["user_name"];
    $appeal = $_POST["appeal"];
    $user_id = $_SESSION["user_id"];
    
    $pdo = new PDO('mysql:host=localhost;dbname=torepon;charset=utf8','shopping','site');
     
    $stmt = $pdo->prepare('UPDATE USERS SET MAIL_ADDRESS = :address , USER_NAME = :user_name , USER_TEXT = :appeal where USER_ID = :user_id');
     
    // 値をセット
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':user_name', $user_name);
    $stmt->bindValue(':appeal', $appeal);
    $stmt->bindValue(':user_id', $user_id);


    $_SESSION['mail'] = $address;                  // メールアドレス
    $_SESSION['user_name'] = $user_name;           // ユーザー名
    $_SESSION['user_text'] = $appeal;              // ひと言
     
    // SQL実行
    $stmt->execute();

    $pdo = null;

    header('Location:profile.php');

?>