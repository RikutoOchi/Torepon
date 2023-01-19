<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    require_once __DIR__ . './classes/trade.php';
    
    // $trade_id = トレードID
    $trade_id = $_GET['id'];
    // $usr = チャット相手のユーザーID
    $usr = $_GET['id2'];
    
    // tradesテーブルのTRADE_IDを取得する処理
    $data= new Trade( );
    $pre = $data->getRecord('trades','TRADE_ID',$trade_id);

    // $trade_progress = TRADE_PROGRESS（トレードの進行状況） 
    $trade_progress=$pre['TRADE_PROGRESS'];

    // TRADE_PROGRESSの値を１つ進めるための処理
    $data1 = new Trade( );
    $trade_progress++;
    $pst = $data1->updateField('trades','TRADE_ID',$trade_id,'TRADE_PROGRESS',$trade_progress);

    // チャット相手のユーザーIDとトレードIDを添付してchat.phpへ
    header("Location:chat.php?id='.$usr.'&id2='.$trade_id.'");
?>