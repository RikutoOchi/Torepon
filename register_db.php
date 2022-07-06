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
        $sql = "select USER_ID from USERS where MAIL_ADDRESS = '" . $Searchdata . "'";

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

        if($judge == ''){
            $mail = 20;
            $judge = False;
        }

    }

    // パスワードのチェック
        // ※文字数制限：6文字以上12文字以下　であるかの確認
    if(preg_match('{6,12}', $password) == 0){
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
        header('Location:register.php?mail=' . $mail . '');
        // header('Location:register.php?mail=' . $mail . '"&length=' . $length . '"&spel' . $spel . '"');
    }else{
        // DB接続に必要なやつ【★★★ 後で、アレした方が良い　★★★】
        $pdo = new PDO(
            'mysql:host=localhost;dbname=torepon;charset=utf8',     //　mysql:host=localhost;dbname="作成したデータベース名”;charset=utf8
            'shopping',     // ユーザー名
            'site');        // パスワード 

        $pdo->query('SET NAMES utf8;');
            
        //SQL文の実行
        $stmt = $pdo->prepare('INSERT INTO USERS(MAIL_ADDRESS,USER_PASSWORD) VALUES(:mail,:pass)');

        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $password, PDO::PARAM_STR);

        //DB切断
        $stmt->execute();
        unset($pdo);

        // 再度login.phpへ
        header('Location:login.php');
    }

?>