<?php
    // セッション再開
    session_start();

    if( empty($_POST['code']) == True ) {
        header('Location:register_certification.php?data=1');
    }

    // データ取得
    $output_code = $_SESSION['code'];       // 送信した認証コード
    $input_code = $_POST['code'];           // ユーザーが入力した認証コード

    // 正しい認証コードであった場合
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
            'site');
                    // パスワード 
        $pdo->query('SET NAMES utf8;');

        //SQL文の実行
        $stmt = $pdo->prepare('INSERT INTO USERS(MAIL_ADDRESS,USER_PASSWORD) VALUES(:mail,:pass)');
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $password, PDO::PARAM_STR);

        //DB切断
        $stmt->execute();
        unset($pdo);

?>


        <!-- ★★★  ここのデザイン  ★★★ -->
        <h1><center>新規登録が完了しました。</center></h1>
        <br>
        <h2><center>ログイン画面より、ログインしてください。</center></h2>
        <br>
        <br>
        <a href='./login.php'><h3><center>ログイン画面へ</center></h3></a>
        <!------------------------------------>


    <?php } else {
        header('Location:register_certification.php?data=1');
    } ?>