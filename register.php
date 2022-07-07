<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/login.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->
</head>
  <body>

    <main class="form-content">
      <p class="ttl-text">新規会員登録</p>

      <!-- エラー内容の表示 -->
      <?php
        if ( isset($_GET['mail']) ) {
          $mail = $_GET['mail'];        // メールアドレス
          $length = $_GET['length'];    // パスワードの長さ
          // $spel = $_GET['spel'];        // パスワードに使われている文字
      ?>
          <?php if($mail == 10){ ?>
            <h3><font color="red"><center><?php echo 'メールアドレスが正しくありません' ?></center></font></h3>    <!-- 有効なメールアドレスでない旨のメッセージを表示 -->
            <br>
            <?php } elseif ($mail == 20) { ?>
            <h3><font color="red"><center><?php echo 'メールアドレスは既に登録されています' ?></center></font></h3>    <!-- メールアドレスが既に登録されている旨のメッセージを表示 -->
            <br>
            <?php } elseif ($mail == 0) { ?>
            <?php if($length == False){ ?>
              <h3><font color="red"><center><?php echo 'パスワードは6文字以上12文字以内にしてください' ?></center></font></h3>    <!-- 有効なパスワードの長さでない旨のメッセージを表示 -->
              <br>
              <?php } ?>
          <?php } ?>
        <?php } ?>


      <form action="./register_db.php" method="post" name="c_form">
        <label for="email" class="label-text">emailを入力してください。</label>
        <div class="email_box">
          <div class="text_inner">
            <input type="email" id="email" class="email_text" name="email" />
            <div class="email_string">emailを入力</div>
          </div>
        </div>
        <label for="password" class="label-text">
          パスワードを入力してください　　※6文字以上12文字以内</label
        >
        <div class="password_box">
          <div class="text_inner">
            <input type="password" id="password" class="password_text" name="password"/>
            <div class="password_string">passwordを入力</div>
          </div>
        </div>
        <div class="login-btn-center">
          <input type="button" value="登録完了" class="login-btn" onclick="document.c_form.submit();"/>
        </div>
      </form>
    </main>
  </body>
</html>

