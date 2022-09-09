<?php
    //データを受け取る
    $email = $_POST['email'];           // メールアドレス
    $password = $_POST['password'];     // パスワード

    // 入力したメールアドレス・パスワードが合っている、【ユーザーID】を取り出す
            // ※パスワード・メールアドレスが合っているかの検証の為に使う
    $sql_judge = "select USER_ID
            from USERS
            where MAIL_ADDRESS = '" . $email . "' and USER_PASSWORD = '" . $password . "'";

    // 入力したメールアドレス・パスワードが合っている、【ユーザーID・メールアドレス・ユーザー名・アイコン・ひと言】を取り出す
    $sql = "select USER_ID,MAIL_ADDRESS,USER_NAME,USER_ICON_URL,USER_TEXT
            from USERS
            where MAIL_ADDRESS = '" . $email . "' and USER_PASSWORD = '" . $password . "'";

    // DB接続に必要なやつ【★★★ 後で、アレした方が良い　★★★】
    $pdo = new PDO(
        'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
        'shopping',     // ユーザー名
        'site');        // パスワード 

    //検索結果を格納
    $judge_data = $pdo->query($sql_judge);
    $data = $pdo->query($sql);

    // 接続終了
    unset($pdo);

    // 正誤判定（ユーザーIDが存在する ＝ パスワード・メールアドレス　が合っている）
    foreach ($judge_data as $row){ 
        $judge = $row['USER_ID'];
    }

    // OKの場合
    if($judge != ''){

        // セッションスタート
        session_start();

        // セッション変数に【ユーザーID、メールアドレス、ユーザー名、アイコン、ひと言】格納
        foreach($data as $row) {
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