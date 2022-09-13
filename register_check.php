<?php

    require_once __DIR__ . './classes/dbdata.php';

    // データを受け取る
    $email = $_POST['email'];           // メールアドレス
    $password = $_POST['password'];     // パスワード
    // 分岐判定用
    $judge = True;

    // メールアドレスチェック（入力されたものが "メールアドレス" かどうかの確認）
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == False){
        $mail = 10;
        $judge = False;
    // メールアドレスチェック（入力されたものが、既に登録されていないかの確認）
    } else{
        $exh = new Dbdata();
        $sql = "select USER_ID from USERS where MAIL_ADDRESS = '" . $email . "'";
        $data = $exh->getRecord_0($sql);

        if( empty($data) ){
            $mail = 0;
        } else {
            $mail = 20;
            $judge = False;
        }
    }

    // パスワードのチェック
    if(mb_strlen($password) < 6 || mb_strlen($password) > 12){
        $length = False;
        $judge = False;
    }

    // 分岐（NO→再度入力画面へ　OK→メールアドレス認証へ）
    if($judge == False){
        header('Location:register.php?mail=' . $mail . '&length=' . $length . '');
        // header('Location:register.php?mail=' . $mail . '"&length=' . $length . '"&spel' . $spel . '"');
    } else {
        session_start();
        $_SESSION['mail'] = $email;
        $_SESSION['password'] = $password;
        header('Location:register_mail.php');
        exit();
    }
?>