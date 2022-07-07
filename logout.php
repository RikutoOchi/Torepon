<?php

    require_once("./temp/header.php");

    // セッションを初期化
    $_SESSION = array();

    // セッションを殺す
    session_destroy();

    // index.phpへ
    header('Location:index.php');

?>