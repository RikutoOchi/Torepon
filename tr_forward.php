<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    require_once __DIR__ . './classes/trade.php'; 
    $trade_id = $_GET['id'];
    
    $usr=$_SESSION['user_id'];
    $data= new Trade( );
    $pre = $data->getRecord('trades','TRADE_ID',$trade_id);
    $trade_progress=$pre['TRADE_PROGRESS'];
    $data1 = new Trade( );
    $trade_progress++;
    $pst = $data1->updateField('trades','TRADE_ID',$trade_id,'TRADE_PROGRESS',$trade_progress);
    header("Location:./chat.php?id= $usr &trade_id=$trade_id");
?>