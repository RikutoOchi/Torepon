<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/chat.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<?php

	session_start();

    require_once __DIR__ . './classes/dbdata.php';
    $exh = new Dbdata();

    $chat_user_data_sql1 = "select DISTINCT PARTNER_USER_ID
                            from CHATS
                            where USER_ID = '" . $_SESSION['user_id'] . "'";               
    $chat_user_data1 = $exh->getRecord_0($chat_user_data_sql1);

    $chat_user_data_sql2 = "select DISTINCT USER_ID
                            from CHATS
                            where PARTNER_USER_ID = '" . $_SESSION['user_id'] . "'";               
    $chat_user_data2 = $exh->getRecord_0($chat_user_data_sql2);


	$data = [];

	foreach($chat_user_data1 as $d1){
		array_push( $data , $d1["PARTNER_USER_ID"] );
	}
	foreach($chat_user_data2 as $d2){
		array_push( $data , $d2["USER_ID"] );
	}

	echo var_dump(array_unique($data));


?>