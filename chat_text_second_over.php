<div class="ajaxReturn">

  <?php
    // セッションスタート
    session_start();

    // DB実行のためのファイルの読み込み
    require_once __DIR__ . './classes/chat_text_second_over_class.php';
  ?>

  <?php

    // トレードIDの取得
    $chat_detail = new Chat_text_second_over_chat_detail();
    $data = $chat_detail->get_chat_detail($_SESSION['id'],$_SESSION['user_id']);

    // チャット相手のユーザーアイコン取り出し
    $chat_detail = new Chat_text_second_over_user_icon();
    $partner_user_icon_data = $chat_detail->get_user_icon($_SESSION['id']);
    
  ?>
          
  <?php
    // 連想配列からチャット相手のユーザーアイコンを取り出し、$partner_user_iconに格納
    foreach($partner_user_icon_data as $icon) {
      $partner_user_icon = $icon['USER_ICON_URL'];
    }
  ?>
      
  <!-- 連想配列からデータを取り出し、表示 -->
  <?php foreach($data as $data_detail) { ?>
    <?php if($data_detail['USER_ID'] != $_SESSION['user_id']) { ?>    <!-- 自分が送った内容のチャットなら、右側に表示させる -->
      <li class="message-disp left">
        <div class="UserIcon"><img src="<?php echo $partner_user_icon ?>" alt=""></div>
        <p class="fukidasi left"><?php echo $data_detail['CHAT_TEXT'] ?></p>                         
      </li>
    <?php } else { ?>                                                 <!-- 相手が送った内容のチャットなら、左側に表示させる -->
      <li class="message-disp right">
        <div class="UserIcon"><img src="<?php echo $_SESSION['user_icon_url'] ?>" alt=""></div>
        <p class="fukidasi right"><?php echo $data_detail['CHAT_TEXT'] ?></p> 
      </li>
    <?php } ?>
  <?php } ?>

</div>  