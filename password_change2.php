<?php
    session_start();
    
    if(empty($_POST['mail']) == True){
        header('Location:password_change.php&data=1');
    }

    // データを取得
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['choise'] = $_POST['choise'];

    // ランダムな値を生成
    $data = rand();
    // 生成した値を保存
    $_SESSION['pas_data'] = $data;

    // メールの設定（言語：日本語、文字コード：UTF-8）
    mb_language("Japanese"); 
    mb_internal_encoding("UTF-8");
    //送信元のメールアドレス
    $from = 'bmkfc77476@yahoo.co.jp';
    //送信先のメールアドレス
    $to = $mail;
    //件名
    $subject = '【トレポン】認証コード～パスワード変更～';        // ★★★　要変更　★★★
    //本文
    $message = 'コードは、「' . $data . '」です';       // ★★★　要変更　★★★

    // 送信に成功した場合
    if (mb_send_mail($to, $subject, $message, 'From: ' . $from)) {
        header('Location:password_change3.php');
        exit();
    // 送信に失敗した場合
    } else {
        header('Location:password_change.php');
        exit();
    }

?>
