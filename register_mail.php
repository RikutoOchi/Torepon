<?php
    // セッション再開
    session_start();

    // データ取得
    $mail = $_SESSION['mail'];              // メールアドレス
    $password = $_SESSION['password'];      // パスワード

    // ランダムな値を生成
    $data = rand();

    // 生成した値を保存
    $_SESSION['code'] = $data;

    // メールの設定（言語：日本語、文字コード：UTF-8）
    mb_language("Japanese"); 
    mb_internal_encoding("UTF-8");
    //送信元のメールアドレス
    $from = 'bmkfc77476@yahoo.co.jp';
    //送信先のメールアドレス
    $to = $mail;
    //件名
    $subject = '【トレポン】登録認証パスワード';        // ★★★　要変更　★★★
    //本文
    $message = 'コードは、「' . $data . '」です';       // ★★★　要変更　★★★

    // 送信に成功した場合
    if (mb_send_mail($to, $subject, $message, 'From: ' . $from)) {
        header('Location:register_certification.php');
        exit();
    // 送信に失敗した場合
    } else {
        header('Location:register.php');
        exit();
    }

?>
