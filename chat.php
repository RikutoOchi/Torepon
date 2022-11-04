<!-- 注意事項

・DBのバージョン要確認　2022/11/04 11:30 時点以降のバージョンを使用する必要あり

/注意事項-->


<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/chat.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<script type="text/javascript" src="ajax.js?ver=1.0"></script>

  <?php
    $_SESSION['id'] = $_GET['id'];
    require_once __DIR__ . './classes/dbdata.php';
    $exh = new Dbdata();

    // トレードIDの取得
    $sql = "select TRADE_ID from CHATS where USER_ID = '" . $_SESSION['user_id'] . "' and PARTNER_USER_ID = '" . $_SESSION['id'] . "'";
    $data = $exh->getRecord_0($sql);
    // $trae_id（トレードID）
    foreach($data as $info){
        $trade_id = $info['TRADE_ID'];
    }
    
  ?>

<main class="chat-main-side-container">
  <!-- チャットユーザーリストの表示 -->
  <section class="ChatUser-disp">
    <ul class="ChatUser-list">

    <div id="ajaxreload">

      <!--　チャット相手の情報取得＆表示 -->
      <?php
        $chat_user_data_sql = "select DISTINCT CHATS.PARTNER_USER_ID,USERS.USER_NAME 
                               from CHATS LEFT OUTER JOIN USERS ON CHATS.PARTNER_USER_ID = USERS.USER_ID
                               where CHATS.USER_ID = '" . $user . "'";
        $chat_user_data = $exh->getRecord_0($chat_user_data_sql);
      ?>

      <?php foreach($chat_user_data as $user_info) { ?>
        <?php 
          $partner_user_id = $user_info['PARTNER_USER_ID'];
        ?>
        <li class="ChatUser"><?php if($partner_user_id == $_SESSION['id']) { ?><a class='ChatUser-choise' href="./chat.php?id=<?php echo $partner_user_id ?>"><?php } else { ?><a class='ChatUser-not-choise' href="./chat.php?id=<?php echo $partner_user_id ?>"> <?php } ?>
          <div class="ChatUser-detail">
          <div class="UserIcon"><img src="./images/プリキュア.png" alt=""></div>
          <div class="UserInfo">
            <ul class="UserInfo-list">
              <li class="UserName"><?php echo $user_info['USER_NAME'] ?></li>
              <li class="UserId"><?php echo $partner_user_id ?></li>
            </ul>

            <!-- 最新のチャット内容の取り出し -->
            <?php
              $chat_detail_sql = "select CHAT_TEXT
                                  from CHATS
                                  where USER_ID = '" . $user . "' and PARTNER_USER_ID = '" . $partner_user_id . "' 
                                  or USER_ID = '" . $partner_user_id . "' and PARTNER_USER_ID = '" . $user . "' ORDER BY CHAT_TIME DESC LIMIT 1";
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

      <!-- /各ユーザーのチャット画面に遷移 -->

    </ul>
  </section>
  <!-- チャットユーザーリストの表示 -->
  <?php if($_SESSION['id'] != 0){ ?>
    <section class="main-content">
    <!-- /mainコンテンツ -->
    <!--追加-->
      <div class="message-content">
        <ul class="kaiwa imessage">

        <div id="ajaxreload2">

          <?php
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
          ?>
        
          <?php foreach($data as $data_detail) { ?>
            <?php if($data_detail['USER_ID'] != $user) { ?>
              <li class="message-disp left">
                <div class="UserIcon"><img src="./images/プリキュア.png" alt=""></div>
                <p class="fukidasi left"><?php echo $data_detail['CHAT_TEXT'] ?></p>                         
              </li>
            <?php } else { ?>
              <li class="message-disp right">
                <div class="UserIcon"><img src="./images/ハンコック.png" alt=""></div>
                <p class="fukidasi right"><?php echo $data_detail['CHAT_TEXT'] ?></p> 
              </li>
            <?php } ?>
          <?php } ?>

        </div>

        </ul>
    
        <div class="my-message">
          <a href = "cancel.html">取引キャンセル申請</a>
          <a href = "tr_forward.php?id=<?php echo $trade_id ?>">取引進行申請</a>
          <div>
            <form action="./chat_db.php?id=<?php echo $_SESSION['id'] ?>" method="post" name="chat_form">
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
