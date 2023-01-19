<div class="ajaxReturn">

    <?php

        // セッションスタート
        session_start();

        // DB実行のための外部ファイルの読み込み
        require_once __DIR__ . './classes/dbdata.php';
        
        $exh = new Dbdata();

    ?>

    <!--　チャット相手の情報取得＆表示 -->
    <?php
    $chat_user_data_sql = "select DISTINCT CHATS.PARTNER_USER_ID,USERS.USER_NAME,USERS.USER_ICON_URL  
                            from CHATS LEFT OUTER JOIN USERS ON CHATS.PARTNER_USER_ID = USERS.USER_ID
                            where CHATS.USER_ID = '" . $_SESSION['user_id'] . "'
                            and CHATS.TRADE_ID = '" . $_SESSION['trade_id'] . "'";
    $chat_user_data = $exh->getRecord_0($chat_user_data_sql);
    ?>

    <?php foreach($chat_user_data as $user_info) { ?>
    <?php 
        $partner_user_id = $user_info['PARTNER_USER_ID'];
    ?>
    <li class="ChatUser"><?php if($partner_user_id == $_SESSION['id']) { ?><a class='ChatUser-choise' href="./chat.php?id=<?php echo $partner_user_id ?>&id2=<?php echo $_SESSION['trade_id'] ?>"><?php } else { ?><a class='ChatUser-not-choise' href="./chat.php?id=<?php echo $partner_user_id ?>&id2=<?php echo $_SESSION['trade_id'] ?>"> <?php } ?>
        <div class="ChatUser-detail">
        <div class="UserIcon"><img src="<?php echo $user_info['USER_ICON_URL'] ?>" alt=""></div>
        <div class="UserInfo">
        <ul class="UserInfo-list">
            <li class="UserName"><?php echo $user_info['USER_NAME'] ?></li>
            <li class="UserId"><?php echo $partner_user_id ?></li>
        </ul>

        <!-- 最新のチャット内容の取り出し -->
        <?php
            $chat_detail_sql = "select CHAT_TEXT
                                from CHATS
                                where USER_ID = '" . $_SESSION['user_id'] . "' and PARTNER_USER_ID = '" . $partner_user_id . "' 
                                or USER_ID = '" . $partner_user_id . "' and PARTNER_USER_ID = '" . $_SESSION['user_id'] . "' ORDER BY CHAT_TIME DESC LIMIT 1";
            $chat_detail = $exh->getRecord_0($chat_detail_sql);
        ?>

        <!-- 最新チャット内容の冒頭10文字 + ..... -->
        <?php foreach($chat_detail as $data_detail) { ?>
            <div class="ChatHistory"><?php echo mb_substr($data_detail['CHAT_TEXT'], 0, 10) . "....." ?></div>
        <?php } ?>

        </div>
        </div>
    </a></li>
    <?php } ?>

</div>