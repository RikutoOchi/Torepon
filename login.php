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
      <form action="./" method="post">
        <label for="email" class="label-text">emailを入力してください。</label>
        <div class="email_box">
          <div class="text_inner">
            <input type="email" id="email" class="email_text" />
            <div class="email_string">emailを入力</div>
          </div>
        </div>
        <label for="password" class="label-text">
          パスワードを入力してください</label
        >
        <div class="password_box">
          <div class="text_inner">
            <input type="password" id="password" class="password_text" />
            <div class="password_string">passwordを入力</div>
          </div>
        </div>
        <div class="login-btn-center">
         <a href="./index.php" class="testResult"> <input type="button" value="ログイン" class="login-btn" /></a>
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
