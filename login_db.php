<?php

    // 入力したメールアドレス・パスワードが合っている、【ユーザーID】を取り出す
    require_once __DIR__ . './classes/login_db_class.php';
    $login_check = new login();
    $login = $login_check->login_check($_POST['email'],$_POST['password']);

    // OKの場合
    if(empty($login) == false){

        // セッションスタート
        session_start();

        // セッション変数に【ユーザーID、メールアドレス、ユーザー名、アイコン、ひと言】格納
        foreach($login as $row) {
            $_SESSION['user_id'] = $row['USER_ID'];                 // ユーザーID
            $_SESSION['mail'] = $row['MAIL_ADDRESS'];               // メールアドレス
            $_SESSION['user_name'] = $row['USER_NAME'];             // ユーザー名
            $_SESSION['user_icon_url'] = $row['USER_ICON_URL'];     // アイコン
            $_SESSION['user_text'] = $row['USER_TEXT'];             // ひと言
        }

        // index.phpへ
        header('Location:index.php');

    // NOの場合
    }else{

        // 再度login.phpへ
        header('Location:login.php?data=1');

    }

?>