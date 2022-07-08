<?php

    require_once('./temp/head.php');

    session_start();

    $output_code = $_SESSION['code'];
    $input_code = $_POST['code'];

    if($output_code == $input_code ){
        // データを取得
        $mail = $_SESSION['mail'];
        $password = $_SESSION['password'];

        // セッションを初期化
        $_SESSION = array();

        // DB接続に必要なやつ【★★★ 後で、アレした方が良い　★★★】
        $pdo = new PDO(
            'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
            'shopping',     // ユーザー名
            'site');        // パスワード 

        $pdo->query('SET NAMES utf8;');
            
        //SQL文の実行
        $stmt = $pdo->prepare('INSERT INTO USERS(MAIL_ADDRESS,USER_PASSWORD) VALUES(:mail,:pass)');

        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $password, PDO::PARAM_STR);

        //DB切断
        $stmt->execute();
        unset($pdo);
    } else {
        echo '認証コードが違います。'; 
    }
?>

<h1><center>新規登録が完了しました。</center></h1>
<br>
<h2><center>ログイン画面より、ログインしてください。</center></h2>
<br>
<br>
<a href='./login.php'><h3><center>ログイン画面へ</center></h3></a>