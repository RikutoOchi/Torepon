<div class="ajaxReturn">

  <?php

  session_start();

  require_once __DIR__ . './classes/dbdata.php';
  $exh = new Dbdata();

  ?>

  <?php

    $chat_user_data_sql = "select DISTINCT CHATS.PARTNER_USER_ID,USERS.USER_NAME,USERS.USER_ICON_URL  
                            from CHATS LEFT OUTER JOIN USERS ON CHATS.PARTNER_USER_ID = USERS.USER_ID
                            where CHATS.USER_ID = '" . $_SESSION['user_id'] . "'";
    $chat_user_data = $exh->getRecord_0($chat_user_data_sql);

    // チャット内容取り出しSQL
    $sql = "select CHAT_TEXT,USER_ID,PARTNER_USER_ID 
            from CHATS
            where USER_ID = '" . $_SESSION['id'] . "' and PARTNER_USER_ID = '" . $_SESSION['user_id'] . "' and FLAG = 0
            or USER_ID = '" . $_SESSION['user_id'] . "' and PARTNER_USER_ID = '" . $_SESSION['id'] . "' and FLAG = 0 ORDER BY CHAT_TIME";
    // チャット相手のユーザーアイコン取り出しSQL
    $partner_user_icon_sql = "select USER_ID,USER_ICON_URL 
                              from USERS
                              where USER_ID = '" . $_SESSION['id'] . "'";
    // チャット内容取り出しSQL実行                   
    $data = $exh->getRecord_0($sql);
    // チャット相手のユーザーアイコン取り出しSQL実行
    $partner_user_icon_data = $exh->getRecord_0($partner_user_icon_sql);
  ?>
          
  <?php
    foreach($partner_user_icon_data as $icon) {
      $partner_user_icon = $icon['USER_ICON_URL'];
    }
  ?>
        
  <?php foreach($data as $data_detail) { ?>
    <?php if($data_detail['USER_ID'] != $_SESSION['user_id']) { ?>
      <li class="message-disp left">
        <div class="UserIcon"><img src="<?php echo $partner_user_icon ?>" alt=""></div>
        <p class="fukidasi left"><?php echo $data_detail['CHAT_TEXT'] ?></p>                         
      </li>
    <?php } else { ?>
      <li class="message-disp right">
        <div class="UserIcon"><img src="<?php echo $_SESSION['user_icon_url'] ?>" alt=""></div>
        <p class="fukidasi right"><?php echo $data_detail['CHAT_TEXT'] ?></p> 
      </li>
    <?php } ?>
  <?php } ?>

</div>  