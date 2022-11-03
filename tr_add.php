<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    require_once __DIR__ . './classes/trade.php'; 
    $tr = new Trade( );
    $exhibit_id = $_GET['id'];
    $tr->tr_add($exhibit_id,$_SESSION['user_id']);
    $usr=$_SESSION['user_id'];
    $sql = "select * from trades where EXHIBIT_ID = '$exhibit_id' and USER_ID= '$usr'";
    $trade = new Trade( );
    $data = $trade->getRecord_0($sql);
    $trade_id=$data['TRADE_ID'];
    header("Location:./chat.php?id= $usr &trade_id=$trade_id");
?>