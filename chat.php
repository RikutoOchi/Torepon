<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/chat.css">
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<!-- dbで使用するやつの呼び出し -->
<?php require_once __DIR__ . './classes/chat_class.php'; ?>
<!-- /dbで使用するやつの呼び出し -->

<script type="text/javascript" src="ajax.js?ver=1.0"></script>

  <?php

    $_SESSION['id'] = $_GET['id'];                    // チャット相手のユーザーIDの取得等
    $_SESSION['trade_id'] = $_GET['id2'];             // トレードIDの取得

    // チャット相手の情報取得
    $chat_user = new Chat_user_info();
    $chat_user_data = $chat_user->get_chat_user_info($_SESSION['user_id'],$_SESSION['trade_id']);

    // 現在の取引の進行状況の取得
    $switch = new Chat_switching();
    $switch_data = $switch->get_switching_data($_SESSION['user_id'],$_SESSION['trade_id'],$_SESSION['id']);

    // 表示するボタンの差別化に使用
    foreach($switch_data as $data) {
      $situation = $data['USER_ID'];   // 申請者のユーザーID
      $progress = $data['TRADE_PROGRESS'];    // トレードの進行状況
    }

  ?>

<main class="chat-main-side-container">
  <!-- チャットユーザーリストの表示 -->
  <section class="ChatUser-disp">
    <ul class="ChatUser-list">

    <div id="ajaxreload">

      <!--　チャット相手の情報表示 -->
      <?php foreach($chat_user_data as $user_info) { ?>
        <li class="ChatUser"><?php if($user_info['PARTNER_USER_ID'] == $_SESSION['id']) { ?><a class='ChatUser-choise' href="./chat.php?id=<?php echo $user_info['PARTNER_USER_ID'] ?>&id2=<?php echo $trade_id ?>"><?php } else { ?><a class='ChatUser-not-choise' href="./chat.php?id=<?php echo $user_info['PARTNER_USER_ID'] ?>&id2=<?php echo $trade_id ?>"> <?php } ?>
          <div class="ChatUser-detail">
          <div class="UserIcon"><img src="<?php echo $user_info['USER_ICON_URL'] ?>" alt=""></div>
          <div class="UserInfo">
            <ul class="UserInfo-list">
              <li class="UserName"><?php echo $user_info['USER_NAME'] ?></li>
              <li class="UserId"><?php echo $user_info['PARTNER_USER_ID'] ?></li>
            </ul>

            <!-- 最新のチャット内容の取り出し -->
            <?php
            // チャット相手の情報取得
              $chat_detail_info = new Chat_detail();
              $chat_detail = $chat_detail_info->get_chat_detail($_SESSION['user_id'],$user_info['PARTNER_USER_ID']);
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

            // チャット相手の情報取得
            $chat_text = new Chat_text();
            $data = $chat_text->get_chat_text($_SESSION['id'],$_SESSION['user_id']);

            // チャット相手のユーザーアイコン取り出しSQL実行
            $chat_partner_user_icon = new Chat_partner_user_icon();
            $partner_user_icon_data = $chat_partner_user_icon->get_partner_user_icon($_SESSION['id']);
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

        </ul>
    
        <div class="my-message">

          <?php if($progress == 1 and $situation != $_SESSION['user_id'] ){ ?>
            <!-- 出品者側のみに表示 -->
            <a href = "cansel.php?id=<?php echo $_SESSION['trade_id'] ?>&id2=<?php echo $_SESSION['id'] ?>">取引キャンセル申請</a>
            <a href = "tr_forward.php?id=<?php echo $_SESSION['trade_id'] ?>&id2=<?php echo $_SESSION['id'] ?>">取引進行申請</a>
            <!-- /出品者側のみに表示 -->
          <?php } elseif($progress == 2 and $situation != $_SESSION['user_id']) { ?>
            <!-- 出品者側側にのみ表示 -->
            <a href = "cancel.php?id=<?php echo $_SESSION['trade_id'] ?>&id2=<?php echo $_SESSION['id'] ?>">取引キャンセル申請</a>
            <a href = "tr_forward.php?id=<?php echo $_SESSION['trade_id'] ?>&id2=<?php echo $_SESSION['id'] ?>">発送完了</a>
            <!-- /出品者側にのみ表示-->
          <?php } elseif($progress == 5) { ?>
            <!-- 出品者・申請者の両方に表示 -->
            <a href = "cancel.html">アンケートに回答する</a>
            <!-- /出品者・申請者の両方に表示 -->
          <?php } else { ?>
            <a href = ""></a>
            <a href = ""></a>
          <?php } ?>

          <div>
            <form action="./chat_db.php?id=<?php echo $_SESSION['id'] ?>&id2=<?php echo $_SESSION['trade_id'] ?>" method="post" name="chat_form">
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
