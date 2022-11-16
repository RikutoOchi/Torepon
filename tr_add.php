<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    require_once __DIR__ . './classes/trade.php';
    $tr = new Trade( );
    $tr->tr_add($_GET['id'],$_SESSION['user_id']);
    $sql = "select * from trades where TRADE_ID = '" . $_GET['id'] . "' and USER_ID= '" . $_SESSION['user_id'] . "'";
    $trade = new Trade( );
    $data = $trade->getRecord_0($sql);
    $trade_id=$data['TRADE_ID'];
    header('Location:chat.php?id='.$_SESSION['user_id'].'');
?>