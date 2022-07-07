<?php
    require_once __DIR__ . './classes/dbdata.php';

    $email = $_POST['email'];           // メールアドレス
    $password = $_POST['password'];     // パスワード

    $exh = new Dbdata();
    $sql = "select USER_ID from USERS where MAIL_ADDRESS = '" . $email . "' and USER_PASSWORD = '" . $password . "'";
    $data = $exh->getRecord_0($sql);

    if(empty($data) == False){
        session_start();
        $_SESSION['user_id'] = $data;   // ユーザーID
        header('Location:index.php');
    }else{
        header('Location:login.php?data=1');
    }
?>