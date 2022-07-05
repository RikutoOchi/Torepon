<?php
    //データを受け取る
    $email = $_POST['email'];           // メールアドレス
    $password = $_POST['password'];     // パスワード

    // メールアドレスのチェック



    // DB接続に必要なやつ【★★★ 後で、アレした方が良い　★★★】
    $pdo = new PDO(
        'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
        'shopping',     // ユーザー名
        'site');        // パスワード 

    $pdo->query('SET NAMES utf8;');
         
    //SQL文の実行
    $stmt = $pdo->prepare('INSERT INTO USERS(MAIL_ADDRESS,USER_PASSWORD) VALUES(:title_data,:point_data)');

    $stmt->bindValue(':mail', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $possword, PDO::PARAM_STR);

    //DB切断
    $stmt->execute();
    unset($pdo);

    // 再度login.phpへ
    header('Location:login.php');

?>