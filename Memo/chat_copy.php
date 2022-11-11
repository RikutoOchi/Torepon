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

  <section class="main-content">
    <!-- /mainコンテンツ -->
    <!--追加-->
    <div class="message-content">
      <ul class="kaiwa imessage">
        <li class="message-disp left">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi left">初めまして！！</p>                         
        </li>
        
     
        <li class="message-disp right">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi right">初めまして、こんにちはー</p> 
        </li>
        <li class="message-disp right">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi right">クマのキーホルダー欲しいのですが、良かったら交換してください…</p> 
        </li>
        <li class="message-disp left">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi left">クマのキーホルダーと交換になりますか？</p>
        </li>
        <li class="message-disp right">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi right">〇〇と交換でどうでしょうか？</p> 
        </li>
        <li class="message-disp left">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi left">〇〇ですね、了解しました！</p>
        </li>
        <li class="message-disp left">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi left">よろしくお願いします。</p>
        </li>
        <li class="message-disp right">
          <div class="UserIcon"><img src="" alt=""></div>
          <p class="fukidasi right">こちらこそ、よろしくお願いします！</p> 
        </li>

      </ul>
   
    <div class="my-message">
    <a href = "cancel.html">取引キャンセル申請</a>
      <div>
      <input class="message-send" type="text" placeholder="メッセージを入力">
      <button><i class="fa-solid fa-paper-plane"></i></button>
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
