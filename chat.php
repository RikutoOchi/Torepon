<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/chat.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->
<main class="chat-main-side-container">
  <!-- チャットユーザーリストの表示 -->
  <section class="ChatUser-disp">
    <ul class="ChatUser-list">

      <!-- 各ユーザーのチャット画面に遷移 -->
      <li class="ChatUser"><a href="./">
        <div class="ChatUser-detail">
        <div class="UserIcon"><img src="" alt=""></div>
        <div class="UserInfo">
          <ul class="UserInfo-list">
            <li class="UserName">神戸 太郎</li>
            <li class="UserId">123456</li>
          </ul>
          <div class="ChatHistory">こちらこそ、よろしくお願...</div>
        </div>
        </div>
      </a></li>
      <!-- /各ユーザーのチャット画面に遷移 -->

    </ul>
  </section>
  <!-- チャットユーザーリストの表示 -->

  <?php

    $user = $_SESSION['user_id'];   // 自分のuser_idの取得
    $trade_id = 1;

    // 取引IDからtime順d－田尾取ってくる

    require_once __DIR__ . './classes/dbdata.php';
    $exh = new Dbdata();

    $sql = "select CHAT_TEXT,USER_ID 
            from CHATS
            where TRADE_ID = '" . $trade_id . "' ORDER BY CHAT_TIME";

    $data = $exh->getRecord_0($sql);

  ?>

  <section class="main-content">
    <!-- /mainコンテンツ -->
    <!--追加-->
    <div class="message-content">
      <ul class="kaiwa imessage">

        <?php foreach($data as $data_detail) { ?>
          <?php if($data_detail['USER_ID'] == $user) { ?>
            <li class="message-disp left">
              <div class="UserIcon"><img src="" alt=""></div>
              <p class="fukidasi left"><?php echo $data_detail['CHAT_TEXT'] ?></p>                         
            </li>
          <?php } else { ?>
            <li class="message-disp right">
              <div class="UserIcon"><img src="" alt=""></div>
              <p class="fukidasi right"><?php echo $data_detail['CHAT_TEXT'] ?></p> 
            </li>
          <?php } ?>
        <?php } ?>
      </ul>
   
    <div class="my-message">
    <a href = "cancel.html">取引キャンセル申請</a>
      <div>
        <form action="./chat_db.php" method="post" name="chat_form">
          <input class="message-send" type="text" placeholder="メッセージを入力" name="chat_text">
          <button><i class="fa-solid fa-paper-plane"></i></button>
        </form>
      </div>
      
    </div>
    </div>
    
   
  </section>

  
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
