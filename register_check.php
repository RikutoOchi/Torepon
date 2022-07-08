<?php
    // データを受け取る
    $email = $_POST['email'];           // メールアドレス
    $password = $_POST['password'];     // パスワード

    $judge = True;

    // メールアドレスチェック（入力されたものが "メールアドレス" かどうかの確認）
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == False){

        $mail = 10;
        $judge = False;

    // メールアドレスチェック（入力されたものが、既に登録されていないかの確認）
    } else{

        

        // 入力されたメールアドレスが、 " MAIL_ADDRESS " に登録されている場合、ユーザーIDを取り出す
        $sql = "select USER_ID from USERS where MAIL_ADDRESS = '" . $email . "'";

        // DB接続に必要なやつ
        $pdo = new PDO('mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
                        'shopping',     // ユーザー名
                        'site');        // パスワード 

        // SQL文実行
        $judge = $pdo->query($sql);

        // 接続終了
        unset($pdo);

        foreach ($judge as $row){ 
            $judge = $row['USER_ID'];
        }

        if( isset($_GET['data']) ){
            $mail = 20;
            $judge = False;
        } else {
            $mail = 0;
        }

    }

    // パスワードのチェック
        // ※文字数制限：6文字以上12文字以下　であるかの確認
    if(mb_strlen($password) < 6 || mb_strlen($password) > 12){
        $length = False;
        $judge = False;
    }

    /* ----- 【パスワードは。英大文字+英小文字+数字　を含むもの】等としていする場合用 -----

    // パスワードのチェック
        // ※英大文字＋英小文字＋数字が入っているか　の確認
    if(preg_match('/^[a-z]+$/', $password) == 0 || preg_match('/^[A-Z]+$/', $password) == 0 || preg_match('/^[0-9]+$/', $password) == 0){
        $spel = False;
        $judge = False;
    }

    ------------------------------------------------------------------------------------ */


    if($judge == False){
        header('Location:register.php?mail=' . $mail . '&length=' . $length . '');
        // header('Location:register.php?mail=' . $mail . '"&length=' . $length . '"&spel' . $spel . '"');
    } else {
        session_start();

        $_SESSION['mail'] = $email;
        $_SESSION['password'] = $password;

        header('Location:register_certification.php');
        exit();
    }
?>