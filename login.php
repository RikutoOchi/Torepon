<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/login.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

  </head>
  <body>
    <main class="form-content">
      <p class="ttl-text">ログイン</p>

      <!-- 追記 -->
      <?php
        // "パスワード" もしくは "メールアドレス" に誤りがあった場合（ログイン試行　2回目～）
        if ( isset($_GET['data']) ) {
          // ★★★　パスワード もしくは メールアドレス に誤りがある旨の文を表示　★★★
        }
      ?>

      <form action="./login_db.php" method="post" name="b_form">
        <label for="email" class="label-text">emailを入力してください。</label>
        <div class="email_box">
          <div class="text_inner">
            <input type="email" id="email" class="email_text" name="email"/>
            <div class="email_string">emailを入力</div>
          </div>
        </div>
        <label for="password" class="label-text">
          パスワードを入力してください</label
        >
        <div class="password_box">
          <div class="text_inner">
            <input type="password" id="password" class="password_text" name="password"/>
            <div class="password_string">passwordを入力</div>
          </div>
        </div>
        <div class="login-btn-center">

          <!--　変更　-->
          <input type="button" value="ログイン" class="login-btn" onclick="document.b_form.submit();"/>
          
        </div>
        <div class="link-center">
          <a href="">パスワードを変更したい、忘れた方はこちら</a><br />
          <a href="register.php">新規会員登録はこちら</a>
        </div>
      </form>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
    <script src="./script/script.js"></script>

  </body>
</html>
