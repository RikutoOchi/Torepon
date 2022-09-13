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

            </ul>

            <div class="my-message">
                <a href="cancel.html">取引キャンセル申請</a>
                <div>
                    <form class="message-send" action="chat.php" method="post">
                        <textarea name="buhin" cols="20" rows="1" placeholder="メッセージを入力"></textarea>
                    </form>
                    <!--<input type="text">-->
                    <button type="submit" name="button"><i class="fa-solid fa-paper-plane"></i></button>
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

<section>
    <?php
  try {
    $db = new
      PDO('mysql:dbname=torepon;host=localhost;charset=utf8', 'shopping', 'site');
    //入力した値をDBへ
    $count = $db->exec('INSERT INTO chats SET CHAT_TEXT="' . $_POST['buhin'] . '",CHAT_TIME = NOW()');
    //登録件数
    echo $count . "件のデータ登録";
  } catch (PDOException $e) {
    //エラー表示
    echo 'DB接続できず:' . $e->getmessage();
  }

  //チャットテーブルを名前淳に取得し$entryに
  $entry = $db->query('SELECT * FROM chats ORDER BY CHAT_TEXT DESC');
  ?>
    <article>
        <?php
    while ($resistar = $entry->fetch()) :
    ?><a href="#"><?php print(mb_substr($resistar['CHAT_TEXT'], 0.50)); ?></a>
        <?php endwhile; ?>
    </article>

    <?php
  // defineの値は環境によって変えてください。
  define('HOSTNAME', 'localhost');
  define('DATABASE', 'torepon');
  define('USERNAME', 'shopping');
  define('PASSWORD', 'site');

  try {
    /// DB接続を試みる
    $db  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
    $msg = "MySQL への接続確認が取れました。";
  } catch (PDOException $e) {
    $isConnect = false;
    $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
  }
  ?>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>MySQL接続確認</title>
    </head>

    <body>
        <h1>MySQL接続確認</h1>
        <p><?php echo $msg; ?></p>
    </body>

    </html>
</section>