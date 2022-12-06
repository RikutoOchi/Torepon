<?php

    // セッション開始
    session_start();

    require_once __DIR__ . './classes/mail_db_class.php';

    // データの格納
    $data = new Mail_procedure();
    $data->mail_procedure_add($_SESSION['name'],$_SESSION['tel'],$_SESSION['postal_code'],$_SESSION['prefecture'],$_SESSION['city'],$_SESSION['address1'],$_SESSION['address2'],$_SESSION['user_id']);

    // 一時的に使用したセッション変数の削除
    unset($_SESSION['name']);
    unset($_SESSION['tel']);
    unset($_SESSION['postal_code']);
    unset($_SESSION['prefecture']);
    unset($_SESSION['city']);
    unset($_SESSION['address1']);
    unset($_SESSION['address2']);

    // index.phpへ
    header('Location:mail-end.php');

?>