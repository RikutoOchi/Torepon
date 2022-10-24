<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/chat.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<meta http-equiv="refresh" content="10; url="<?php echo $_SERVER['PHP_SELF']; ?>">

  <?php
    require_once __DIR__ . './classes/dbdata.php';
    $exh = new Dbdata();
  ?>

<main class="chat-main-side-container">
  <!-- チャットユーザーリストの表示 -->
  <section class="ChatUser-disp">
    <ul class="ChatUser-list">

      <!--　チャット相手の情報取得＆表示 -->
      <?php
        $chat_user_data_sql = "select DISTINCT CHATS.PARTNER_USER_ID,USERS.USER_NAME,USERS.USER_ICON_URL  
                               from CHATS LEFT OUTER JOIN USERS ON CHATS.PARTNER_USER_ID = USERS.USER_ID
                               where CHATS.USER_ID = '" . $_SESSION['user_id'] . "'";
        $chat_user_data = $exh->getRecord_0($chat_user_data_sql);
      ?>

      <?php foreach($chat_user_data as $user_info) { ?>
        <?php 
          $partner_user_id = $user_info['PARTNER_USER_ID'];
        ?>
        <li class="ChatUser"><?php if($partner_user_id == $_GET['id']) { ?><a class='ChatUser-choise' href="./chat.php?id=<?php echo $partner_user_id ?>"><?php } else { ?><a class='ChatUser-not-choise' href="./chat.php?id=<?php echo $partner_user_id ?>"> <?php } ?>
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
      <!-- /各ユーザーのチャット画面に遷移 -->

    </ul>
  </section>
  <!-- チャットユーザーリストの表示 -->

  <?php if($_GET['id'] != 0){ ?>
    <section class="main-content">
    <!-- /mainコンテンツ -->
    <!--追加-->
      <div class="message-content">
        <ul class="kaiwa imessage">

          <?php
            // チャット内容取り出しSQL
            $sql = "select CHAT_TEXT,USER_ID,PARTNER_USER_ID 
                    from CHATS
                    where USER_ID = '" .$_GET['id'] . "' and PARTNER_USER_ID = '" . $_SESSION['user_id'] . "'
                    or USER_ID = '" . $_SESSION['user_id'] . "' and PARTNER_USER_ID = '" . $_GET['id'] . "' ORDER BY CHAT_TIME";
            // チャット相手のユーザーアイコン取り出しSQL
            $partner_user_icon_sql = "select USER_ID,USER_ICON_URL 
                                      from USERS
                                      where USER_ID = '" .$_GET['id'] . "'";
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
        </ul>
    
        <div class="my-message">
          <a href = "cancel.html">取引キャンセル申請</a>
          <div>
            <form action="./chat_db.php?id=<?php echo $_GET['id'] ?>" method="post" name="chat_form">
              <input class="message-send" type="text" placeholder="メッセージを入力" name="chat_text">
              <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  
<section class="chat-ad">
  <!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->
</section>

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
